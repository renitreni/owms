<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Exports\VoucherExport;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;

class VoucherController extends Controller
{
    public function index()
    {
        return view('layouts.app', [
            "header"    => 'Vouchers',
            "component" => 'vouchers-page',
            "data"      => [
                'datatable_link' => route('voucher.table'),
                'store_link'     => route('voucher.store'),
                'export_link'    => route('voucher.export'),
            ],
        ]);
    }

    public function table(Voucher $voucher)
    {
        $vouchers = $voucher->newQuery()->where('agency_id', auth()->user()->agency_id);

        return DataTables::of($vouchers)->setTransformer(function ($value) {
            $value->created_at_display = Carbon::parse($value->created_at)->format('F j, Y');

            $value->update_link      = route('voucher.update', ['voucher' => $value->id]);
            $value->invalid_link     = route('voucher.invalid');
            $value->cash_voucherlink = route('cash.voucher', ['id' => $value->id]);

            return collect($value)->toArray();
        })->make(true);
    }

    public function store(Request $request)
    {
        $request               = $request->input();
        $request['status']     = 'active';
        $request['agency_id']  = auth()->user()->agency_id;
        $request['created_by'] = auth()->id();

        Voucher::create($request);

        return ['success' => true];
    }

    public function update(Request $request)
    {
        Voucher::updateOrCreate(
            ['id' => $request->voucher],
            $request->input()
        );

        return ['success' => true];
    }

    public function invalid(Request $request)
    {
        Voucher::updateOrCreate(
            ['id' => $request->id],
            ['status' => 'cancelled']
        );

        return ['success' => true];
    }

    public function cashVoucher(Request $request, Agency $agency)
    {
        $voucher = Voucher::query()->where('id', $request->id)->with(['information'])->first();
        $agency  = $agency->where('id', $voucher->agency_id)->first();

        return view('components.agency.voucher', compact('voucher', 'agency'));
    }

    public function export()
    {
        $date_now = Carbon::now()->format('Y-m-d_h:i:sA');

        return Excel::download(new VoucherExport, "vouchers-{$date_now}.xlsx");
    }
}
