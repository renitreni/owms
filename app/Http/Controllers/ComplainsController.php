<?php

namespace App\Http\Controllers;

use App\Mail\NewComplain;
use App\Models\Complains;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            $images[] = $request->file('image1')->storeAs('', $request->file('image1')->getClientOriginalName());
        }
        if ($request->file('image2')) {
            $images[] = $request->file('image2')->storeAs('', $request->file('image2')->getClientOriginalName());
        }
        if ($request->file('image3')) {
            $images[] = $request->file('image3')->storeAs('', $request->file('image3')->getClientOriginalName());
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
            "iqama" =>  $request->iqama,
            "national_id" =>  $request->national_id,
        ]);

        Mail::to(['renier.trenuela@gmail.com'])
            ->bcc(['renier.trenuela@gmail.com'])
            ->send(new NewComplain($request));

        return view('success');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function show(Complains $complains)
    {
        //
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
    public function update(Request $request, Complains $complains)
    {
        //
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
