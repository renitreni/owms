<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Employer;
use App\Models\Candidate;
use App\Models\Information;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\EmployerStoreRequest;

class EmployerController extends Controller
{
    public function index()
    {
        return view('components.agency.employer');
    }

    public function table(User $user)
    {
        $employers = $user->getEmployersByAgency(auth()->id());

        return DataTables::of($employers)->setTransformer(function ($value) {
            $value->created_at_display = Carbon::parse($value->created_at)->format('F j, Y');
            $value->applicant_count = Candidate::query()->where('employer_id', $value->id)->count();
            foreach ($value->employee as $key => $idx)
            {
                $value->employee[$key]->id_e = Crypt::encrypt($idx->id);
            }
            return collect($value)->toArray();
        })->make(true);
    }

    public function create()
    {
        return view('components.agency.employer-form');
    }

    public function store(EmployerStoreRequest $request)
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
        $information->address_line_1 = $request->address_line_1;
        $information->address_line_2 = $request->address_line_2;
        $information->city           = $request->city;
        $information->contact_name   = $request->contact_name;
        $information->phone          = $request->phone;
        $information->email          = $request->email;
        $information->status         = $request->status;
        $information->type           = $request->type;
        $information->created_by     = auth()->id();
        $information->save();

        return redirect()->route('employers')->with(['success' => 'New Employer has been added']);
    }

    public function show($id, User $user)
    {
        $user = $user->newQuery()->where('id', $id)->with('information')->get()[0];

        return view('components.agency.employer-edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user           = User::find($id);
        $user->email    = $request->name;
        $user->save();

        $information                 = Information::where('user_id', $id)->first();
        $information->national_id    = $request->national_id;
        $information->name           = $request->name;
        $information->address_line_1 = $request->address_line_1;
        $information->address_line_2 = $request->address_line_2;
        $information->city           = $request->city;
        $information->contact_name   = $request->contact_name;
        $information->phone          = $request->phone;
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
