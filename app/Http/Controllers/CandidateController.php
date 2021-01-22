<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Faker\Factory;
use App\Models\User;
use App\Models\Report;
use App\Models\Document;
use App\Models\Employer;
use App\Models\Candidate;
use App\Models\Information;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\EmployRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\CandidateStoreRequest;

class CandidateController extends Controller
{
    public function index()
    {
        if (! \Gate::any(['admin', 'gov'])) {
            return redirect()->back();
        }

        return view('components.admin.candidates');
    }

    public function tableCandidates(Candidate $candidate)
    {
        $candidate = $candidate->newQuery()
                               ->with(['agency', 'employer']);

        return DataTables::of($candidate)->setTransformer(function ($value) {
            $value->created_at_display = Carbon::parse($value->created_at)->format('M j, Y');
            $value->date_hired         = $value->date_hired ? Carbon::parse($value->date_hired)->format('M j, Y') : '';
            $value->date_deployed      = $value->date_deployed ? Carbon::parse($value->date_deployed)
                                                                       ->format('M j, Y') : '';
            $value->age                = Carbon::parse($value->birth_date)->diffInYears(Carbon::now());

            return collect($value)->toArray();
        })->make(true);
    }

    public function applicants(User $user)
    {
        $employers = $user->getEmployersByAgency(auth()->id())->get();

        return view('components.agency.applicants', compact('employers'));
    }

    public function tableApplicants(Candidate $candidate)
    {
        $candidate = $candidate->newQuery()
                               ->where('agency_id', auth()->id())
                               ->where('status', 'applicant')
                               ->with(['agency', 'employer']);

        return DataTables::of($candidate)->setTransformer(function ($value) {
            $value->created_at_display = Carbon::parse($value->created_at)->format('M j, Y');
            $value->date_hired         = Carbon::parse($value->date_hired)->format('M j, Y');
            $value->age                = Carbon::parse($value->birth_date)->diffInYears(Carbon::now());

            return collect($value)->toArray();
        })->make(true);
    }

    public function create($id, Information $information)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => [
                function ($attribute, $value, $fail) {
                    if (User::isAgency($value) == 0) {
                        $fail('The ' . $attribute . ' is invalid.');
                    }
                },
            ],
        ]);

        if ($validator->errors()->messages()) {
            return abort(403);
        }

        $hold        = $information->newQuery()->select(['name', 'user_id'])->where('user_id', $id)->get()[0];
        $agency_name = $hold['name'];
        $agency_id   = $hold['user_id'];

        return view('components.agency.applicant-form', compact('agency_name', 'agency_id'));
    }

    public function store(CandidateStoreRequest $request)
    {
        $faker = Factory::create();
        $code  = $faker->hexColor;

        $candidate               = new Candidate();
        $candidate->code         = $code;
        $candidate->agency_id    = $request->agency_id;
        $candidate->passport     = $request->passport;
        $candidate->position_1   = $request->position_1;
        $candidate->position_2   = $request->position_2;
        $candidate->position_3   = $request->position_3;
        $candidate->first_name   = $request->first_name;
        $candidate->middle_name  = $request->middle_name;
        $candidate->last_name    = $request->last_name;
        $candidate->language     = $request->language;
        $candidate->birth_date   = $request->birth_date;
        $candidate->gender       = $request->gender;
        $candidate->civil_status = $request->civil_status;
        $candidate->spouse       = $request->spouse;
        $candidate->blood_type   = $request->blood_type;
        $candidate->height       = $request->height;
        $candidate->weight       = $request->weight;
        $candidate->religion     = $request->religion;
        $candidate->mother_name  = $request->mother_name;
        $candidate->father_name  = $request->father_name;
        $candidate->contact_1    = $request->contact_1;
        $candidate->contact_2    = $request->contact_2;
        $candidate->email        = $request->email;
        $candidate->address      = $request->address;
        $candidate->agreed       = $request->agreed;
        $candidate->place_issue  = $request->place_issue;
        $candidate->birth_place  = $request->birth_place;
        $candidate->save();

        $path = $request->file('cv')->store('cv');

        $doc               = new Document();
        $doc->candidate_id = $candidate->id;
        $doc->path         = $path;
        $doc->type         = 'CV';
        $doc->created_by   = auth()->id();
        $doc->save();

        return redirect()
            ->route('candidate.new', ['id' => $request->agency_id])
            ->with('success',
                "Please remember this SECRET CODE: $code"
            );
    }

    public function show($id)
    {
        if (! Candidate::belongsToAgency($id, auth()->id())) {
            abort(403);
        }

        $results = Candidate::find($id);
        $doc     = Document::query()->where('candidate_id', $id)->get();

        return view('components.agency.applicant-edit', compact('results', 'doc'));
    }

    public function update(Request $request)
    {
        $candidate               = Candidate::find($request->id);
        $candidate->agency_id    = $request->agency_id;
        $candidate->passport     = $request->passport;
        $candidate->position_1   = $request->position_1;
        $candidate->position_2   = $request->position_2;
        $candidate->position_3   = $request->position_3;
        $candidate->first_name   = $request->first_name;
        $candidate->middle_name  = $request->middle_name;
        $candidate->last_name    = $request->last_name;
        $candidate->language     = $request->language;
        $candidate->birth_date   = $request->birth_date;
        $candidate->gender       = $request->gender;
        $candidate->civil_status = $request->civil_status;
        $candidate->spouse       = $request->spouse;
        $candidate->blood_type   = $request->blood_type;
        $candidate->height       = $request->height;
        $candidate->weight       = $request->weight;
        $candidate->religion     = $request->religion;
        $candidate->mother_name  = $request->mother_name;
        $candidate->father_name  = $request->father_name;
        $candidate->contact_1    = $request->contact_1;
        $candidate->contact_2    = $request->contact_2;
        $candidate->email        = $request->email;
        $candidate->address      = $request->address;
        $candidate->place_issue  = $request->place_issue;
        $candidate->birth_place  = $request->birth_place;
        $candidate->save();

        if ($request->has('cv')) {
            $doc = Document::query()->where('type', 'CV')->where('candidate_id', $candidate->id);
            if ($doc->count() > 0) {
                \Storage::delete($doc->get()[0]->path);
            }
            $path = $request->file('cv')->store('cv');

            Document::query()->where('type', 'CV')->where('candidate_id', $candidate->id)->delete();

            $doc               = new Document();
            $doc->candidate_id = $candidate->id;
            $doc->path         = $path;
            $doc->type         = 'CV';
            $doc->created_by   = auth()->id();
            $doc->save();
        }

        return redirect()
            ->route('candidate.applicant')
            ->with('success', "Applicant has been updated.");
    }

    public function employed(User $user)
    {
        $employers  = $user->getEmployersByAgency(auth()->id())->get();
        $affiliates = $user->getAffiliatesByAgency(auth()->id())->get();

        return view('components.agency.employed', compact('employers', 'affiliates'));
    }

    public function tableEmployed(Candidate $candidate)
    {
        $candidate = $candidate->newQuery()
                               ->where('agency_id', auth()->id())
                               ->where('status', 'employed')
                               ->with(['agency', 'employer', 'affiliates']);

        return DataTables::of($candidate)->setTransformer(function ($value) {
            $value->created_at_display = Carbon::parse($value->created_at)->format('M j, Y');
            $value->date_hired         = ! $value->date_hired ?: Carbon::parse($value->date_hired)->format('M j, Y');
            $value->date_deployed      = ! $value->date_deployed ?: Carbon::parse($value->date_deployed)
                                                                          ->format('M j, Y');
            $value->age                = Carbon::parse($value->birth_date)->diffInYears(Carbon::now());

            return collect($value)->toArray();
        })->make(true);
    }

    public function deploy(Request $request)
    {
        $candidate                   = Candidate::find($request->id);
        $candidate->deployed         = 'yes';
        $candidate->agency_abroad_id = $request->agency_abroad_id;
        $candidate->date_deployed    = Carbon::now()->format('Y-m-d');
        $candidate->save();

        return redirect()->back()
                         ->with('success', "Employee has been deployed.");
    }

    public function employ(EmployRequest $request)
    {
        $candidate                    = Candidate::find($request->id);
        $candidate->employer_id       = $request->employer_id;
        $candidate->status            = "employed";
        $candidate->salary            = $request->salary;
        $candidate->position_selected = $request->position_selected;
        $candidate->date_hired        = Carbon::now()->format('Y-m-d');
        $candidate->save();

        return redirect()->back()
                         ->with('success', "Employer has been assigned.");
    }

    public function overview($id)
    {
        $candidate = Candidate::query()->where('id', $id)->with(['employer', 'agency', 'affiliates'])->get()[0];
        $doc       = Document::query()->where('candidate_id', $id)->get();

        return view('components.candidate-overview', compact('candidate', 'doc'));
    }
}
