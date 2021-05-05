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
            "position_1"   => "required|max:255",
            "birth_date"   => "required|date|max:255",
            "passport"     => "max:255",
            "position_2"   => "max:255",
            "position_3"   => "max:255",
            "first_name"   => "max:255",
            "middle_name"  => "max:255",
            "last_name"    => "max:255",
            "language"     => "max:255",
            "gender"       => "max:255",
            "civil_status" => "max:255",
            "spouse"       => "max:255",
            "blood_type"   => "max:255",
            "height"       => "max:255",
            "weight"       => "max:255",
            "religion"     => "max:255",
            "mother_name"  => "max:255",
            "father_name"  => "max:255",
            "contact_1"    => "max:255",
            "contact_2"    => "max:255",
            "email"        => "max:255",
            "address"      => "required",
            "agreed"       => "required",
            "picfull"      => "mimes:jpg,png",
            "pic1x1"       => "mimes:jpg,png",
        ];
    }
}
