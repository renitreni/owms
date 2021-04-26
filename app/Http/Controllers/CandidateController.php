<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Agency;
use App\Models\Document;
use App\Models\Employer;
use PDF;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Mail\SecretCodeMail;
use Yajra\DataTables\DataTables;
use App\Models\EmploymentHistory;
use App\Http\Requests\EmployRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\CandidateStoreRequest;
use DB;

class CandidateController extends Controller
{
    public function index()
    {
        return view('components.admin.candidates');
    }

    public function tableCandidates(Candidate $candidate)
    {
        $candidate = $candidate->newQuery()->where('agency_id', auth()->user()->agency_id)
                               ->with(['agency', 'employer']);

        return DataTables::of($candidate)->setTransformer(function ($value) {
            $value->created_at_display = Carbon::parse($value->created_at)->format('M j, Y');
            $value->date_hired         = $value->date_hired ? Carbon::parse($value->date_hired)->format('M j, Y') : '';
            $value->date_deployed      = $value->date_deployed ? Carbon::parse($value->date_deployed)
                                                                       ->format('M j, Y') : '';
            $value->age                = Carbon::parse($value->birth_date)->diffInYears(Carbon::now());
            $value->id_e               = Crypt::encrypt($value->id);

            return collect($value)->toArray();
        })->make(true);
    }

    public function tableApplicants(Candidate $candidate)
    {
        $candidate = $candidate->newQuery()
                               ->where('agency_id', auth()->user()->agency_id)
                               ->whereIn('status', [null, 'applicant'])
                               ->with(['agency', 'employer']);

        return DataTables::of($candidate)->setTransformer(function ($value) {
            $value->created_at_display = Carbon::parse($value->created_at)->format('M j, Y');
            $value->date_hired         = Carbon::parse($value->date_hired)->format('M j, Y');
            $value->age                = Carbon::parse($value->birth_date)->diffInYears(Carbon::now());
            $value->id_e               = Crypt::encrypt($value->id);

            return collect($value)->toArray();
        })->make(true);
    }

    public function applicants(User $user)
    {
        $employers        = $user->getEmployersByAgency(auth()->user()->agency_id)->get();
        $candidate_new    = route('candidate.new', ['agency_id' => Crypt::encrypt(auth()->user()->agency_id)]);
        $candidate_create = route('candidate.create', ['agency_id' => Crypt::encrypt(auth()->user()->agency_id)]);

        return view('components.agency.applicants', compact('employers', 'candidate_new', 'candidate_create'));
    }

    public function create($agency_id, Agency $agency)
    {
        $agency_id   = Crypt::decrypt($agency_id);
        $agency      = $agency->newQuery()->select(['name', 'id'])->where('id', $agency_id)->first();
        $agency_name = $agency->name;

        return view('components.agency.applicant-form', compact('agency_name', 'agency_id'));
    }

    public function new($agency_id, Agency $agency)
    {
        $agency_id   = Crypt::decrypt($agency_id);
        $agency      = $agency->newQuery()->select(['name', 'id'])->where('id', $agency_id)->first();
        $agency_name = $agency->name;

        return view('components.agency.applicant-create', compact('agency_name', 'agency_id'));
    }

    public function store(CandidateStoreRequest $request, Candidate $candidate)
    {
        $candidate = $candidate->store($request);

        $employment = json_decode($request->employment);

        $path = $request->file('cv')->store('cv');

        $doc               = new Document();
        $doc->candidate_id = $candidate->id;
        $doc->filename     = $path;
        $doc->path         = $path;
        $doc->type         = 'CV';
        $doc->created_by   = 'Public Form';
        $doc->save();

        if ($request->hasFile('picfull')) {
            $path = $request->file('picfull')->store('picfull');

            $doc               = new Document();
            $doc->candidate_id = $candidate->id;
            $doc->filename     = $path;
            $doc->path         = $path;
            $doc->type         = 'picfull';
            $doc->created_by   = 'Public Form';
            $doc->save();
        }

        if ($request->hasFile('pic1x1')) {
            $path = $request->file('pic1x1')->store('pic1x1');

            $doc               = new Document();
            $doc->candidate_id = $candidate->id;
            $doc->filename     = $path;
            $doc->path         = $path;
            $doc->type         = 'pic1x1';
            $doc->created_by   = 'Public Form';
            $doc->save();
        }

        EmploymentHistory::query()->where('candidate_id', $candidate->id)->delete();

        foreach ($employment as $values) {
            EmploymentHistory::create([
                "candidate_id" => $candidate->id,
                "country"      => $values->country,
                "position"     => $values->position,
                "year"         => $values->year,
                "company"      => $values->company,
            ]);
        }

        return redirect()
            ->route('candidate.new', ['agency_id' => Crypt::encrypt($request->agency_id)])
            ->with('success', "Your Application has been submitted!");
    }

    public function insert(CandidateStoreRequest $request, Candidate $candidate)
    {
        $model = $candidate->store($request);

        $path = $request->file('cv')->store('cv');

        $doc               = new Document();
        $doc->candidate_id = $model->id;
        $doc->filename     = $path;
        $doc->path         = $path;
        $doc->type         = 'CV';
        $doc->created_by   = auth()->id();
        $doc->save();

        if ($request->hasFile('picfull')) {
            $path = $request->file('picfull')->store('picfull');

            $doc               = new Document();
            $doc->candidate_id = $model->id;
            $doc->filename     = $path;
            $doc->path         = $path;
            $doc->type         = 'picfull';
            $doc->created_by   = auth()->id();
            $doc->save();
        }

        if ($request->hasFile('pic1x1')) {

            $path = $request->file('pic1x1')->store('pic1x1');

            $doc               = new Document();
            $doc->candidate_id = $model->id;
            $doc->filename     = $path;
            $doc->path         = $path;
            $doc->type         = 'pic1x1';
            $doc->created_by   = auth()->id();
            $doc->save();
        }

        $employment = json_decode($request->employment);

        EmploymentHistory::query()->where('candidate_id', $model->id)->delete();

        foreach ($employment as $values) {
            EmploymentHistory::create([
                "candidate_id" => $model->id,
                "country"      => $values->country,
                "position"     => $values->position,
                "year"         => $values->year,
                "company"      => $values->company,
            ]);
        }

        return redirect()
            ->route('candidate.applicant')
            ->with('success', "Your Application has been submitted!")->withInput();
    }

    public function show($id)
    {
        $id         = Crypt::decrypt($id);
        $results    = Candidate::query()->where('id', $id)->first();
        $employment = EmploymentHistory::query()->where('candidate_id', $id)->get();
        $doc        = DB::table('documents')->where('candidate_id', $id)->where('type', 'CV')->get();
        $pic_1x1    = DB::table('documents')->where('candidate_id', $id)->where('type', 'pic1x1')->get();
        $pic_full   = DB::table('documents')->where('candidate_id', $id)->where('type', 'picfull')->get();

        return view('components.agency.applicant-edit', compact('results', 'doc', 'employment', 'pic_1x1', 'pic_full'));
    }

    public function update(Request $request, Candidate $candidate)
    {
        $employment = json_decode($request->employment);

        EmploymentHistory::query()->where('candidate_id', $request->id)->delete();
        foreach ($employment as $values) {
            EmploymentHistory::create([
                "candidate_id" => $request->id,
                "country"      => $values->country,
                "position"     => $values->position,
                "year"         => $values->year,
                "company"      => $values->company,
            ]);
        }

        if ($request->has('cv')) {
            $doc = Document::query()->where('type', 'CV')->where('candidate_id', $request->id);
            if ($doc->count() > 0) {
                \Storage::delete($doc->get()[0]->path);
            }
            $path = $request->file('cv')->store('cv');

            Document::query()->where('type', 'CV')->where('candidate_id', $request->id)->delete();

            $doc               = new Document();
            $doc->candidate_id = $request->id;
            $doc->filename     = $path;
            $doc->path         = $path;
            $doc->type         = 'CV';
            $doc->created_by   = auth()->id();
            $doc->save();
        }

        if ($request->hasFile('pic_full')) {
            $doc = Document::query()->where('type', 'pic_full')->where('candidate_id', $request->id);
            if ($doc->count() > 0) {
                \Storage::delete($doc->get()[0]->path);
            }
            $path = $request->file('pic_full')->store('pic_full');

            Document::query()->where('type', 'pic_full')->where('candidate_id', $request->id)->delete();

            $doc               = new Document();
            $doc->candidate_id = $request->id;
            $doc->filename     = $path;
            $doc->path         = $path;
            $doc->type         = 'picfull';
            $doc->created_by   = auth()->id();
            $doc->save();
        }

        if ($request->hasFile('pic1x1')) {
            $doc = Document::query()->where('type', 'pic1x1')->where('candidate_id', $request->id);
            if ($doc->count() > 0) {
                \Storage::delete($doc->get()[0]->path);
            }
            $path = $request->file('pic1x1')->store('pic1x1');

            Document::query()->where('type', 'pic1x1')->where('candidate_id', $request->id)->delete();

            $doc               = new Document();
            $doc->candidate_id = $request->id;
            $doc->filename     = $path;
            $doc->path         = $path;
            $doc->type         = 'pic1x1';
            $doc->created_by   = auth()->id();
            $doc->save();
        }

        $candidate->newQuery()->where('id', $request->id)->update($request->except([
            '_token',
            'employment',
            'pic1x1',
            'pic_full',
        ]));

        return redirect()
            ->route('candidate.applicant')
            ->with('success', "Applicant has been updated.");
    }

    public function employed(User $user)
    {
        $employers  = $user->getEmployersByAgency(auth()->user()->agency_id)->get();
        $affiliates = $user->getAffiliatesByAgency(auth()->user()->agency_id)->get();

        return view('components.agency.employed', compact('employers', 'affiliates'));
    }

    public function tableEmployed(Candidate $candidate)
    {
        $candidate = $candidate->newQuery()
                               ->where('agency_id', auth()->user()->agency_id)
                               ->where('candidates.status', 'employed')
                               ->with(['agency', 'employer', 'affiliates']);

        return DataTables::of($candidate)->setTransformer(function ($value) {
            $value->created_at_display = Carbon::parse($value->created_at)->format('M j, Y');
            $value->date_hired         = ! $value->date_hired ?: Carbon::parse($value->date_hired)->format('M j, Y');
            $value->date_deployed      = ! $value->date_deployed ?: Carbon::parse($value->date_deployed)
                                                                          ->format('M j, Y');
            $value->age                = Carbon::parse($value->birth_date)->diffInYears(Carbon::now());
            $value->id_e               = Crypt::encrypt($value->id);

            return collect($value)->toArray();
        })->make(true);
    }

    public function deploy(Request $request)
    {
        if ($request->agency_abroad_id != "null") {
            $candidate                   = Candidate::find($request->id);
            $candidate->deployed         = 'yes';
            $candidate->agency_abroad_id = $request->agency_abroad_id;
            $candidate->date_deployed    = Carbon::now()->format('Y-m-d');
            $candidate->save();
        } else {
            $candidate                   = Candidate::find($request->id);
            $candidate->deployed         = 'no';
            $candidate->agency_abroad_id = null;
            $candidate->date_deployed    = null;
            $candidate->save();
        }

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
        $id        = Crypt::decrypt($id);
        $candidate = Candidate::query()->where('id', $id)->with(['employer', 'agency', 'affiliates'])->get()[0];
        $doc       = Document::query()->where('candidate_id', $id)->get();

        return view('components.candidate-overview', compact('candidate', 'doc', 'id'));
    }

    public function sendCode(Request $request)
    {
        Mail::to($request->email)->send(new SecretCodeMail($request));

        return ['success' => true];
    }

    public function toPDF(Request $request)
    {
        Candidate::updateOrCreate(
            ['id' => $request->id],
            ['remarks' => $request->remarks]
        );

        $results = Candidate::query()->where('id', $request->id)->with(['agency', 'employment', 'documentPic1x1', 'documentPicFull'])->first();

        $pdf = PDF::loadView("printables.resume", compact('results'));
        $now = Carbon::now();

        return $pdf->setPaper('a4')->download("{$results->last_name}_{$results->first_name}_{$now}.pdf");
    }
}
