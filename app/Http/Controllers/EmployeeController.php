<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('components.employee');
    }

    public function table()
    {
        $employers = DB::table('employees')->whereNull('deleted_at');

        if (auth()->user()->role != 1) {
            $employers->where('agency_code', auth()->user()->agency_code);
        }

        return DataTables::of($employers)->setTransformer(function ($value) {
            $value->created_at_display = Carbon::parse($value->created_at)->format('F j, Y');

            return collect($value)->toArray();
        })->make(true);
    }
}
