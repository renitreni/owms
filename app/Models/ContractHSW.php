<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractHSW extends Model
{
    use HasFactory;

    protected $fillable = [
        "employer_name",
        "visa_no",
        "address",
        "street",
        "district",
        "city",
        "cs_employer",
        "no_family_members",
        "telephone",
        "mobile",
        "email",
        "worker_name",
        "position",
        "address_ph",
        "cs_worker",
        "contact_no",
        "passport_no",
        "date_issued",
        "place_issued",
        "kin_name",
        "kin_address",
        "employment_site",
        "salary",
        "agency_id",
        "approved_by",
        "approved_date",
        "status",
    ];
}
