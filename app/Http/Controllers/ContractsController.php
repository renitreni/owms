<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Contract;
use App\Models\Information;
use App\Models\Requisition;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyOfContractStatus;

class ContractsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $agency = Agency::query()->where('id', decrypt($request->id))->first();

        return view('layouts.app', [
            "header"    => 'Submitted Contracts of ' . $agency->name,
            "component" => 'contracts-page',
            "data"      => [
                'datatable_link'   => route('contracts.table', ['id' => $request->id]),
                'contract_us_link' => route('status.contract.update'),
            ],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function table(Request $request)
    {
        return DataTables::of(Contract::query()->where('agency_id', decrypt($request->id)))
                         ->setTransformer(function ($value) {
                             $value->details = json_decode($value->details);

                             return collect($value)->toArray();
                         })->make(true);
    }

    public function updateStatus(Request $request)
    {
        $contract         = Contract::query()->where('serial_no', $request->serial_no)->first();
        $details          = json_decode($contract['details']);
        $details->remarks = $request->remarks;

        $requisition_id = Requisition::query()->where('name', $contract['name'])->first()['id'];
        Contract::query()->where('serial_no', $request->serial_no)
                ->update([
                    'status'       => $request->status,
                    'approved_by'  => Information::getNameById(auth()->id()),
                    'requisite_id' => $requisition_id,
                    'details'      => json_encode($details),
                ]);

        Mail::to(['yaramayservices@gmail.com', 'sab_prince@yahoo.com'])
            ->send(new NotifyOfContractStatus($request->serial_no, $request->remarks, $request->status));

        return ['success' => true];
    }
}
