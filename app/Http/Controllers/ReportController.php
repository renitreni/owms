<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Requests\ReportSubmitRequest;

class ReportController extends Controller
{
    public function formEmployer($id)
    {
        if (! Candidate::belongsToEmployer($id, auth()->id())) {
            abort(403);
        }
        $candidate = Candidate::query()->where('id', $id)->get()[0];

        return view('components.report-employer-form', compact('candidate'));
    }

    public function submit(ReportSubmitRequest $request)
    {
        $report               = new Report();
        $report->candidate_id = $request->candidate_id;
        $report->employer_id  = $request->employer_id;
        $report->created_by   = $request->created_by;
        $report->concerns      = $request->concerns;
        $report->save();

        return redirect()->route('candidate.employees')->with('success', "Status report has been submitted.");
    }
}
