<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidateStoreRequest extends FormRequest
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
            "passport"     => 'required',
            "position_1"   => "required",
            "position_2"   => "",
            "position_3"   => "",
            "first_name"   => "",
            "middle_name"  => "",
            "last_name"    => "",
            "language"     => "",
            "birth_date"   => "",
            "gender"       => "",
            "civil_status" => "",
            "spouse"       => "",
            "blood_type"   => "",
            "height"       => "",
            "weight"       => "",
            "religion"     => "",
            "mother_name"  => "",
            "father_name"  => "",
            "contact_1"    => "",
            "contact_2"    => "",
            "email"        => "",
            "address"      => "required",
            "cv"           => "required|mimes:doc,pdf,docx",
        ];
    }
}
