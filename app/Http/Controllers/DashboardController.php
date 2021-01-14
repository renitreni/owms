<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $employerLateRp = DB::select(DB::raw(/** @lang mysql */ "select *
            from (
                 Select
                 distinct reports.candidate_id,
                 max(reports.created_at) as latest_dated_report,
                 reports.created_by
            from reports
            join candidates c on reports.candidate_id = c.id
            where reports.created_by = 'employer'
            and c.deployed = 'yes'
            group by reports.candidate_id, reports.created_by
            order by reports.candidate_id
                     ) as cildrcb
            where TIMESTAMPDIFF(MONTH, cildrcb.latest_dated_report, NOW()) > 2")
        );

        $employerLateRpCnt = count($employerLateRp);

        $employeeLateRp = DB::select(DB::raw(/** @lang mysql */ "select *
            from (
                 Select
                 distinct reports.candidate_id,
                 max(reports.created_at) as latest_dated_report,
                 reports.created_by
            from reports
            join candidates c on reports.candidate_id = c.id
            where reports.created_by = 'employer'
            and c.deployed = 'yes'
            group by reports.candidate_id, reports.created_by
            order by reports.candidate_id
                     ) as cildrcb
            where TIMESTAMPDIFF(MONTH, cildrcb.latest_dated_report, NOW()) > 2")
        );

        $employeeLateRpCnt = count($employeeLateRp);

        return view('dashboard', compact('employerLateRpCnt', 'employerLateRp', 'employeeLateRp', 'employeeLateRp'));
    }
}
