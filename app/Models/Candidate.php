<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    public function agency()
    {
        return $this->hasOne(User::class, 'id', 'agency_id');
    }

    public function employer()
    {
        return $this->hasOne(User::class, 'id', 'employer_id');
    }

    public function agent()
    {
        return $this->hasOne(User::class, 'id', 'agent_id');
    }
}
