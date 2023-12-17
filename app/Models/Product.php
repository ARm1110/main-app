<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'offer_price',
        'offer_id'
    ];

    public function childcategory()
    {
        return $this->belongsTo(Childcategory::class);
        # impalement
    }

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }
}
