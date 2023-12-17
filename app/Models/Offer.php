<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'discount', 'expires_at'];

    protected $dates = ['expires_at'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function isValid()
    {
        // Check if the offer is still valid based on the expiration date
        return now()->lt($this->expires_at);
    }
}
