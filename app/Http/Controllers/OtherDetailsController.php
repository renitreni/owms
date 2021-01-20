<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OtherDetailsController extends Controller
{
    public function show($id)
    {
        return view('components.agency.employee-details');
    }
}
