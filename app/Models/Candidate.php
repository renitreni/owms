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
        return $this->hasOne(Information::class, 'user_id', 'employer_id');
    }

    public function agent()
    {
        return $this->hasOne(Agent::class, 'id', 'agent_id');
    }

    public static function belongsToAgency($id, $agency_id)
    {
        return (new static())->where('id', $id)->where('agency_id', $agency_id)->count() > 0;
    }
}
