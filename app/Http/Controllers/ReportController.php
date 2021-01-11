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
    public function formEmployer($id)
    {
        if (! Candidate::belongsToEmployer($id, auth()->id())) {
            abort(403);
        }
        $candidate = Candidate::query()->where('id', $id)->get()[0];

        return view('components.employer.report-employer-form', compact('candidate'));
    }

    public function submit(ReportSubmitRequest $request)
    {
        $report               = new Report();
        $report->candidate_id = $request->candidate_id;
        $report->employer_id  = $request->employer_id;
        $report->created_by   = $request->created_by;
        $report->concerns     = $request->concerns;
        $report->save();

        return redirect()->route('candidate.employees')->with('success', "Status report has been submitted.");
    }

    public function fromEmployer($id)
    {
        if (! Candidate::belongsToEmployer($id, auth()->id())) {
            abort(403);
        }
        $candidate = Candidate::query()->where('id', $id)->get()[0];

        return view('components.employer.reports-employee', compact('candidate'));
    }

    public function employeeTable(Request $request, Report $report)
    {
        $reports = $report->newQuery()->where('candidate_id', $request->id)->where('created_by', 'employer');

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

    public function formEmployee()
    {
        return view('components.agency.report-employee-form');
    }

    public function validateSecretCode(Request $request)
    {
        return Candidate::query()
                        ->where('code', $request->secret_code)
                        ->where('passport', $request->passport)->with(['employer'])
                        ->get();
    }
}
