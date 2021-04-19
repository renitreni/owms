<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        "date",
        "paid_to",
        "particulars",
        "amount",
        "change",
        "status",
        "created_by"
    ];

    public function information()
    {
        return $this->hasOne(Information::class, 'user_id', 'created_by');
    }
}
