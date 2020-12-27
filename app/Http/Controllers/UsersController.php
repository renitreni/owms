<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;
use App\Http\Requests\UsersStoreRequest;
use App\Http\Requests\UpdateUserRequest;

class UsersController extends Controller
{
    public function index()
    {
        return view('components.users');
    }

    public function table()
    {
        $user = DB::table('users')->whereNull('deleted_at');

        if (auth()->user()->role != 1) {
            $user->where('agency_code', auth()->user()->agency_code);
        }

        return DataTables::of($user)->setTransformer(function ($value) {
            $value->created_at_display = Carbon::parse($value->created_at)->format('F j, Y');

            return collect($value)->toArray();
        })->make(true);
    }

    public function create()
    {
        return view('components.user-form');
    }

    public function store(UsersStoreRequest $request)
    {
        $user              = new User();
        $user->name        = $request->name;
        $user->email       = $request->email;
        $user->password    = bcrypt($request->password);
        $user->role        = $request->role;
        $user->agency_code = auth()->user()->agency_code;
        $user->save();

        return redirect()->route('users')->with('success', 'New user has been added!');
    }

    public function show($id)
    {
        $user = User::query()->where('id', $id);

        if (auth()->user()->role != 1) {
            $user->where('agency_code', auth()->user()->agency_code);
        }
        if (isset($user->get()[0])) {
            $result = $user->get()[0];
        } else {
            return redirect()->route('users')->with('warning', 'Illegal action has detected!');
        }

        return view('components.users-edit', ['user' => $result]);
    }

    public function resetPassword($id)
    {
        $user           = User::find($id);
        $user->password = bcrypt('password');
        $user->save();

        return redirect()->route('users')->with('success', 'Password has been reset!');
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user        = User::find($id);
        $user->name  = $request->name;
        $user->email = $request->email;
        $user->role  = $request->role;
        $user->save();

        return redirect()->route('users')->with('success', 'User has been updated!');
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('users')->with('success', 'User has been deleted!');
    }
}
