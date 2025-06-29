<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table='provinces';
    use HasFactory;


    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }
}
