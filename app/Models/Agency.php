<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
      'name',
      'address',
      'logo_path',
      'poea',
      'status',
      'created_by'
    ];
}
