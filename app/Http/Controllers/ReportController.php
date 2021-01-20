<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Report;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\ReportSubmitRequest;

class ReportController extends Controller
{
    public function index()
    {
        return view('components.reports');
    }

    public function table(Request $request, Report $report)
    {
        $reports = $report::query()->with(['employee', 'employer']);

        return DataTables::of($reports)->setTransformer(function ($value) {
            $value->created_at_display = Carbon::parse($value->created_at)->format('F j, Y');

            return collect($value)->toArray();
        })->make(true);
    }

    public function submit(ReportSubmitRequest $request)
    {
        $attachment_1 = '';
        $attachment_2 = '';
        $attachment_3 = '';

        if ($request->has('attachment_1')) {
            $attachment_1 = $request->file('attachment_1')->store('report_docs');
        }
        if ($request->has('attachment_2')) {

            $attachment_2 = $request->file('attachment_2')->store('report_docs');
        }
        if ($request->has('attachment_3')) {
            $attachment_3 = $request->file('attachment_3')->store('report_docs');
        }

        $report                  = new Report();
        $report->candidate_id    = $request->candidate_id;
        $report->employer_id     = $request->employer_id;
        $report->created_by      = $request->created_by;
        $report->comments        = $request->comments;
        $report->salary_received = $request->salary_received;
        $report->salary_date     = $request->salary_date;
        $report->attachment_1    = $attachment_1;
        $report->attachment_2    = $attachment_2;
        $report->attachment_3    = $attachment_3;
        $report->save();

        return redirect()->back()->with('success', "Status report has been submitted.");
    }

    public function employerReportView($id)
    {
        if (! Candidate::belongsToEmployer($id, auth()->id())) {
            abort(403);
        }
        $candidate = Candidate::query()->where('id', $id)->get()[0];

        return view('components.employer.reports-employee', compact('candidate'));
    }

    public function employeeTable(Request $request, Report $report)
    {
        $reports = $report->newQuery()
                          ->where('candidate_id', $request->id)
                          ->where('created_by', 'employer')
                          ->with(['employee']);

        return DataTables::of($reports)->setTransformer(function ($value) {
            $value->created_at_display = Carbon::parse($value->created_at)->format('F j, Y');

            return collect($value)->toArray();
        })->make(true);
    }

    public function formEmployerView($id)
    {
        $report    = Report::query()->where('id', $id)->get()[0];
        $candidate = Candidate::query()->where('id', $report->candidate_id)->get()[0];

        if (! Candidate::belongsToEmployer($report->candidate_id, $report->employer_id)) {
            abort(403);
        }

        return view('components.employer.report-employer-view', compact('candidate', 'report'));
    }

    public function validateSecretCode(Request $request)
    {
        return Candidate::query()
                        ->where('code', $request->secret_code)
                        ->where('passport', $request->passport)->with(['employer'])
                        ->get();
    }

    public function formEmployee()
    {
        return view('components.report-employee-form');
    }
}
