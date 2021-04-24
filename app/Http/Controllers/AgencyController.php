<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Agency;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AgencyController extends Controller
{
    public function index()
    {
        return view('layouts.app', [
            "header"    => 'Agencies',
            "component" => 'agency-page',
            "data"      => [
                'datatable_link' => route('agencies.table'),
                'store_link'     => route('voucher.store'),
                'export_link'    => route('voucher.export'),
            ],
        ]);
    }

    public function table()
    {
        return DataTables::of(Agency::all())->setTransformer(function ($value) {
            $value->created_at_display = Carbon::parse($value->created_at)->format('F j, Y');

            $value->update_link      = route('voucher.update', ['voucher' => $value->id]);
            $value->invalid_link     = route('voucher.invalid');
            $value->cash_voucherlink = route('cash.voucher', ['id' => $value->id]);

            return collect($value)->toArray();
        })->make(true);
    }
}
