<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'city_id',
        'province_id',
        'first_name',
        'last_name',
        'full_address',
        'tel',
        'postal_code',
        'description',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function getFullNameAttribute()
    {
        return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
    }
}
