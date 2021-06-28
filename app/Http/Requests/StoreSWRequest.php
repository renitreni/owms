<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSWRequest extends FormRequest
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
            "employer_name"        => "required",
            "employer_address"     => "required",
            "po_box_no"            => "required",
            "telephone"            => "required",
            "fax"                  => "required",
            "employee_name"        => "required",
            "cs_status"            => "required",
            "passport_no"          => "required",
            "date_issued"          => "required",
            "place_issued"         => "required",
            "employee_address"     => "required",
            "site_of_employment"   => "required",
            "employee_position"    => "required",
            "salary"               => "required",
            "witness_day"          => "required",
            "witness_month"        => "required",
            "witness_year"         => "required",
            "witness_place"        => "required",
            "employer_national_id" => "required",
        ];
    }
}
