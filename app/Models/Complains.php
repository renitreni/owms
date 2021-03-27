<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complains extends Model
{
    use HasFactory;

    protected $fillable = [
        "first_name",
        "middle_name",
        "last_name",
        "gender",
        "occupation",
        "passport",
        "email_address",
        "contact_number",
        "contact_number2",
        "location_ksa",
        "employer_name",
        "employer_contact",
        "employer_national_id",
        "saudi_agency",
        "agency",
        "complain",
        "image1",
        "image2",
        "image3",
        "actual_langitude",
        "actual_longitude",
        "iqama",
        "national_id",
    ];
}
