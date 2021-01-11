<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Information;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UsersStoreRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\ChangePasswordRequest;

class UsersController extends Controller
{
    public function index()
    {
        return view('components.admin.users');
    }

    public function table(User $user)
    {
        $user = $user->newQuery()->with('information');

        return DataTables::of($user)->setTransformer(function ($value) {
            $value->created_at_display = Carbon::parse($value->created_at)->format('F j, Y');

            return collect($value)->toArray();
        })->make(true);
    }

    public function create()
    {
        return view('components.admin.user-form');
    }

    public function store(UsersStoreRequest $request)
    {
        $user           = new User();
        $user->email    = $request->email;
        $user->password = bcrypt('tabangpass');
        $user->role     = $request->role;
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

        return redirect()->route('users')->with('success', 'New user has been added!');
    }

    public function show($id, User $user)
    {
        $user = $user->newQuery()->where('id', $id)->with('information')->get()[0];

        return view('components.users-edit', ['user' => $user]);
    }

    public function resetPassword($id)
    {
        $user           = User::find($id);
        $user->password = bcrypt('tabangpass');
        $user->save();

        return redirect()->route('users')->with('success', 'Password has been reset!');
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user        = User::find($id);
        $user->email = $request->email;
        $user->role  = $request->role;
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

        return redirect()->route('users')->with('success', 'User has been updated!');
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('users')->with('success', 'User has been deleted!');
    }

    public function indexChangePass()
    {
        return view('components.changepass');
    }

    public function changePass(ChangePasswordRequest $request)
    {
        $user           = User::find(auth()->id());
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', 'User has been deleted!');
    }
}
