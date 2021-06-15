<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHSWRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "employer_name"     => "required",
            "visa_no"           => "required",
            "address"           => "required",
            "street"            => "required",
            "district"          => "required",
            "city"              => "required",
            "cs_employer"       => "required",
            "no_family_members" => "required",
            "telephone"         => "required",
            "mobile"            => "required",
            "email"             => "required",
            "worker_name"       => "required",
            "position"          => "required",
            "address_ph"        => "required",
            "cs_worker"         => "required",
            "contact_no"        => "required",
            "passport_no"       => "required",
            "date_issued"       => "required",
            "place_issued"      => "required",
            "kin_name"          => "required",
            "kin_address"       => "required",
            "employment_site"   => "required",
            "salary"            => "required",
        ];
    }
}
