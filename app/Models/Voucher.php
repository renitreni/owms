<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        "agency_id",
        "applicant_name",
        "status",
        "req_id_fare",
        "passporting_allowance",
        "info_sheet",
        "ticket",
        "testda_allowance",
        "nbi_renewal_fare",
        "medical_allowance",
        "owwa_allowance",
        "office_allowance",
        "created_by",
    ];

    public function information()
    {
        return $this->hasOne(Information::class, 'user_id', 'created_by');
    }
}
