<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'merchant_id',
        'ref_id',
        'amount',
        'callback_url',
        'description',
        'metadata',
        'authority',
        'status',
        'track_payment'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
