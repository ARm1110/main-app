<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class Product extends Model
{
    use HasFactory;
    use Searchable;


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

    public function carts()
    {
        return $this->belongsToMany(Cart::class)->using(CartProduct::class)->withPivot('quantity');
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product')->withPivot('quantity', 'price');
    }

    public function specialOffer()
    {
        return $this->hasMany(SpecialOffer::class);
    }

}
