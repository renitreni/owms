<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        "details",
        "serial_no",
        "name",
        "status",
        "agency_id",
        "requisite_id",
        "approved_by",
    ];
}
