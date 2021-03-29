<?php

namespace App\Http\Controllers;

use App\Mail\NewComplain;
use App\Models\Complains;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\DataTables;

class ComplainsController extends Controller
{
    public function form(Request $request)
    {
        return view('complains');
    }

    public function submit(Request $request)
    {
        $images = [];
        if ($request->file('image1')) {
            $images[] = $request->file('image1')->store('complains');
        }
        if ($request->file('image2')) {
            $images[] = $request->file('image2')->store('complains');
        }
        if ($request->file('image3')) {
            $images[] = $request->file('image3')->store('complains');
        }

        Complains::create([
            "first_name" => $request->first_name,
            "middle_name" =>  $request->middle_name,
            "last_name" =>  $request->last_name,
            "gender" =>  $request->gender,
            "passport" =>  $request->passport,
            "location_ksa" =>  $request->location_ksa,
            "email_address" =>  $request->email_address,
            "contact_number" =>  $request->contact_number,
            "contact_number2" =>  $request->contact_number2,
            "occupation" =>  $request->occupation,
            "employer_name" =>  $request->employer_name,
            "employer_contact" =>  $request->employer_contact,
            "agency" =>  $request->agency,
            "complain" =>  $request->complain,
            "actual_langitude" =>  $request->actual_langitude,
            "actual_longitude" =>  $request->actual_longitude,
            "national_id" =>  $request->national_id,
            "contact_person" =>  $request->contact_person,
            "employer_national_id" => $request->employer_national_id,
            "host_agency" => $request->host_agency,
            "image1" => !isset($images[0]) ?: $images[0],
            "image2" => !isset($images[1]) ?: $images[1],
            "image3" => !isset($images[2]) ?: $images[2],
        ]);

        Mail::to(['Sab_princes@yahoo.com'])
            ->bcc(['renier.trenuela@gmail.com'])
            ->send(new NewComplain($request));

        return view('success');
    }

    public function table()
    {
        return DataTables::of(Complains::all())->setTransformer(function ($value) {
            $value->created_at_display = Carbon::parse($value->created_at)->format('F j, Y');
            $value->route_show = route('complains.show', ['id' => $value->id]);
            return collect($value)->toArray();
        })->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('components.admin.complain');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Complains  $complains
     * @return \Illuminate\Http\Response
     */
    public function show($id, Complains $complains)
    {
        $preview = $complains->where('id', $id)->first();

        return view('components.admin.complain-show', compact('preview'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Complains  $complains
     * @return \Illuminate\Http\Response
     */
    public function edit(Complains $complains)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Complains  $complains
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, Complains $complains)
    {
        $complains->where('id', $id)
            ->update(['remarks' => $request->remarks]);

        return redirect()->route('complains.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Complains  $complains
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complains $complains)
    {
        //
    }
}
