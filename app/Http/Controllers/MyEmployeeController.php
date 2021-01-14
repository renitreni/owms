<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Report;
use App\Models\Document;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MyEmployeeController extends Controller
{
    public function index()
    {
        return view('components.employer.employee');
    }

    public function table(Candidate $candidate)
    {
        $candidate = $candidate->newQuery()
                               ->where('employer_id', auth()->id())
                               ->where('status', 'employed')
                               ->where('deployed', 'yes')
                               ->with(['agency', 'employer', 'agent']);

        return DataTables::of($candidate)->setTransformer(function ($value) {
            $value->created_at_display = Carbon::parse($value->created_at)->format('M j, Y');
            $value->date_hired         = Carbon::parse($value->date_hired)->format('M j, Y');
            $value->age                = Carbon::parse($value->birth_date)->diffInYears(Carbon::now());
            $value->reports            = Report::query()
                                               ->where('candidate_id', $value->id)
                                               ->where('created_by', 'employer')
                                               ->count();

            return collect($value)->toArray();
        })->make(true);
    }

    public function show($id)
    {
        if (! Candidate::belongsToEmployer($id, auth()->id())) {
            abort(403);
        }

        $results = Candidate::find($id);
        $doc     = Document::query()->where('candidate_id', $id)->get();

        return view('components.agency.applicant-edit', compact('results', 'doc'));
    }
}
