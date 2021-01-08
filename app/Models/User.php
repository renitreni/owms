<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function noInfoIds()
    {
        return (new static())->newQuery()
                             ->selectRaw('users.id')
                             ->leftJoin('information as inf', 'inf.user_id', '=', 'users.id')
                             ->whereNull('inf.user_id')
                             ->pluck('id');
    }

    public function getEmployersByAgency($id)
    {
        return $this->newQuery()->where('agency_id', $id)->with(['information']);
    }

    public static function getEmployersIds()
    {
        return (new static())->newQuery()->where('role', 3)->pluck('id');
    }

    public static function getAgentIds()
    {
        return (new static())->newQuery()->where('role', 2)->pluck('id');
    }

    public static function isAgency($id)
    {
        return (new static())->newQuery()->where('role', 2)->where('id', $id)->count();
    }

    public function information()
    {
        return $this->hasOne(Information::class, 'user_id', 'id');
    }
}
