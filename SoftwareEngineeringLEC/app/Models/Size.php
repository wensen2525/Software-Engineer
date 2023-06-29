<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $table = 'sizes';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = [];

    public function carts(){
        return $this->hasMany(Cart::class);
    }

    public function checkones(){
        return $this->hasMany(CheckOne::class);
    }
}
