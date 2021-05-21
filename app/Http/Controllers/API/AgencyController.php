<?php

namespace App\Http\Controllers\API;

use App\Models\Agency;
use App\Models\AgencyAlert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    public function getAgenciesAPI()
    {
        $agency = Agency::query()->select(['name', 'poea', 'status', 'logo_path'])->get();

        return fractal($agency, function ($value) {
            return [
                'agency_name'     => $value->name ?? '',
                'poea_no'         => $value->poea ?? '',
                'agency_status'   => $value->status ?? '',
                'image_logo_link' => $value->logo_path ?? '',
            ];
        });
    }

    public function getAgenciesAlertsAPI()
    {
        $agencyAlert = AgencyAlert::query()->with(['agency', 'level'])->get();

        return fractal($agencyAlert, function ($value) {
            return [
                'agency_name'       => $value->agency["name"] ?? '',
                'poea_no'           => $value->agency["poea"] ?? '',
                'image_logo_link'   => $value->agency["logo_path"] ?? '',
                'alert_color'       => $value->level["color_level"] ?? '',
                'alert_name'        => $value->level["name"] ?? '',
                'alert_description' => $value->level["description"] ?? '',
            ];
        });
    }
}
