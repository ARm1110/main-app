<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialOffer extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id', 'discount', 'start_date', 'end_date',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function getDiscountedPriceAttribute()
    {
        if ($this->product) {
            return $this->product->price - ($this->product->price * ($this->discount / 100));
        }

        return null;
    }
}
