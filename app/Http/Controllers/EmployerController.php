<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Employer;
use App\Models\Candidate;
use App\Models\Information;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\User;

class EmployerController extends Controller
{
    public function index()
    {
        return view('components.employer');
    }

    public function table(User $user)
    {
        $employers = $user->getAgenycById(auth()->id());

        return DataTables::of($employers)->setTransformer(function ($value) {
            $value->created_at_display = Carbon::parse($value->created_at)->format('F j, Y');
            $value->applicant_count = Candidate::query()->where('employer_id', $value->id)->count();
            return collect($value)->toArray();
        })->make(true);
    }

    public function create()
    {
        return view('components.employer-form');
    }

    public function store(Request $request)
    {
        $user            = new User();
        $user->email     = $request->email;
        $user->password  = bcrypt('tabangpass');
        $user->role      = 3;
        $user->agency_id = auth()->id();
        $user->save();

        $information                 = new Information();
        $information->user_id        = $user->id;
        $information->national_id    = $request->national_id;
        $information->name           = $request->name;
        $information->tin            = $request->tin;
        $information->address_line_1 = $request->address_line_1;
        $information->address_line_2 = $request->address_line_2;
        $information->city           = $request->city;
        $information->zip_code       = $request->zip_code;
        $information->contact_name   = $request->contact_name;
        $information->phone          = $request->phone;
        $information->fax            = $request->fax;
        $information->email          = $request->email;
        $information->status         = $request->status;
        $information->type           = $request->type;
        $information->created_by     = auth()->id();
        $information->save();

        return redirect()->route('employers')->with(['success' => 'New Employer has been added']);
    }

    public function show($id, User $user)
    {
        if (!Employer::belongsToAgency($id, auth()->id())) {
            abort(403);
        }

        $user = $user->newQuery()->where('id', $id)->with('information')->get()[0];

        return view('components.employer-edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user           = User::find($id);
        $user->email    = $request->name;
        $user->save();

        $information                 = Information::find($id);
        $information->national_id    = $request->national_id;
        $information->name           = $request->name;
        $information->tin            = $request->tin;
        $information->address_line_1 = $request->address_line_1;
        $information->address_line_2 = $request->address_line_2;
        $information->city           = $request->city;
        $information->zip_code       = $request->zip_code;
        $information->contact_name   = $request->contact_name;
        $information->phone          = $request->phone;
        $information->fax            = $request->fax;
        $information->email          = $request->email;
        $information->status         = $request->status;
        $information->type           = $request->type;
        $information->created_by     = auth()->id();
        $information->save();

        return redirect()->route('employers')->with(['success' => 'New Employer has been updated!']);
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('employers')->with(['success' => 'Employer has been deleted!']);
    }

    public function resetPassword($id)
    {
        $user           = User::find($id);
        $user->password = bcrypt('tabangpass');
        $user->save();

        return redirect()->route('employers')->with('success', 'Password has been reset!');
    }
}
