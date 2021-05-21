<?php

namespace App\Http\Controllers\API;

use App\Models\Agency;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    public function getAgenciesAPI()
    {
        return Agency::query()->select(['name', 'poea', 'status', 'logo_path'])->get();
    }
}
