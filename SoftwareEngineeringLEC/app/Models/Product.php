<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = [];

    public function ratings(){
        return $this->hasMany(Rating::class);
    }

    public function carts(){
        return $this->hasMany(Cart::class);
    }

    public function checkones(){
        return $this->hasMany(CheckOne::class);
    }
}
