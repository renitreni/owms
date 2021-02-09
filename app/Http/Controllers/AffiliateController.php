<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Candidate;
use App\Models\Information;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\AffiliateStoreRequest;

class AffiliateController extends Controller
{
    public function index()
    {
        return view('components.agency.affiliates');
    }

    public function create()
    {
        return view('components.agency.affiliate-form');
    }

    public function store(AffiliateStoreRequest $request)
    {
        $user            = new User();
        $user->email     = $request->email;
        $user->password  = bcrypt('tabangpass');
        $user->role      = 5;
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

        return redirect()->route('affiliates')->with(['success' => 'New Co-Host has been added']);
    }


    public function table(User $user)
    {
        $employers = $user->getAffiliatesByAgency(auth()->id());

        return DataTables::of($employers)->setTransformer(function ($value) {
            $value->created_at_display = Carbon::parse($value->created_at)->format('F j, Y');
            $value->applicant_count = Candidate::query()->where('employer_id', $value->id)->count();
            return collect($value)->toArray();
        })->make(true);
    }

    public function show($id)
    {
        $user = User::query()->where('id', $id)->with(['information'])->get()[0];

        return view('components.agency.affiliate-edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user           = User::find($id);
        $user->email    = $request->name;
        $user->save();

        $information                 = Information::where('user_id', $id)->first();
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
        $information->status         = $request->status;
        $information->type           = $request->type;
        $information->created_by     = auth()->id();
        $information->save();

        return redirect()->route('affiliates')->with(['success' => 'Co-Host has been updated!']);
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('affiliates')->with(['success' => 'Co-Host has been deleted!']);
    }

    public function resetPassword($id)
    {
        $user           = User::find($id);
        $user->password = bcrypt('tabangpass');
        $user->save();

        return redirect()->route('affiliates')->with('success', 'Password has been reset!');
    }
}
