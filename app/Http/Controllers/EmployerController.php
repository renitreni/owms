<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Employer;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;

class EmployerController extends Controller
{
    public function index()
    {
        return view('components.employer');
    }

    public function table()
    {
        $employers = DB::table('employers')->whereNull('deleted_at');

        if (auth()->user()->role != 1) {
            $employers->where('agency_code', auth()->user()->agency_code);
        }

        return DataTables::of($employers)->setTransformer(function ($value) {
            $value->created_at_display = Carbon::parse($value->created_at)->format('F j, Y');

            return collect($value)->toArray();
        })->make(true);
    }

    public function create()
    {
        return view('components.employer-form');
    }

    public function store(Request $request)
    {
        $model                 = new Employer();
        $model->name           = $request->name;
        $model->tin            = $request->tin;
        $model->email          = $request->email;
        $model->phone          = $request->phone;
        $model->fax            = $request->fax;
        $model->address_line_1 = $request->address_line_1;
        $model->address_line_2 = $request->address_line_2;
        $model->city           = $request->city;
        $model->zip_code       = $request->zip_code;
        $model->status         = $request->status;
        $model->type           = $request->type;
        $model->contact_name   = $request->contact_name;
        $model->created_by     = auth()->user()->id;
        $model->agency_code    = auth()->user()->agency_code;
        $model->save();

        return redirect()->route('employers')->with(['success' => 'New Employer has been added']);
    }

    public function show($id)
    {
        $employer = Employer::query()->where('id', $id);

        if (auth()->user()->role != 1) {
            $employer->where('agency_code', auth()->user()->agency_code);
        }

        if ($employer->count()) {
            $employer = $employer->get()[0];
        } else {
            return redirect()->route('employers')->with('warning', 'Illegal action has detected!');
        }

        return view('components.employer-edit', compact('employer', 'id'));
    }

    public function update(Request $request, $id)
    {
        $model                 = Employer::find($id);
        $model->name           = $request->name;
        $model->tin            = $request->tin;
        $model->email          = $request->email;
        $model->phone          = $request->phone;
        $model->fax            = $request->fax;
        $model->address_line_1 = $request->address_line_1;
        $model->address_line_2 = $request->address_line_2;
        $model->city           = $request->city;
        $model->zip_code       = $request->zip_code;
        $model->status         = $request->status;
        $model->type           = $request->type;
        $model->contact_name   = $request->contact_name;
        $model->save();

        return redirect()->route('employers')->with(['success' => 'New Employer has been updated!']);
    }

    public function destroy($id)
    {
        Employer::destroy($id);

        return redirect()->route('employers')->with(['success' => 'Employer has been deleted!']);
    }
}
