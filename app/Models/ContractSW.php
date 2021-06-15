<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractSW extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "employer_name",
        "employer_address",
        "po_box_no",
        "telephone",
        "fax",
        "employee_name",
        "cs_status",
        "passport_no",
        "date_issued",
        "place_issued",
        "employee_address",
        "site_of_employment",
        "employee_position",
        "salary",
        "witness_day",
        "witness_month",
        "witness_year",
        "witness_place",
        "agency_id",
        "approved_by",
        "approved_date",
        "status",
    ];
}
