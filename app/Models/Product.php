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
        'offer_id',
        'status',
        'childcategory_id',
        'brand_id'
    ];

    public function childcategory()
    {
        return $this->belongsTo(Childcategory::class);

    }

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }


    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function videos()
    {
        return $this->hasMany(ProductVideo::class);
    }

}
