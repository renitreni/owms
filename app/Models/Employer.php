<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory, SoftDeletes;

    public static function belongsToAgency($id, $agency_id)
    {
        return (new static())->where('id', $id)->where('agency_id', $agency_id)->count() > 0;
    }
}
