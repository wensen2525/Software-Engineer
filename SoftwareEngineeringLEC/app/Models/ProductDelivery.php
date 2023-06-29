<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDelivery extends Model
{
    use HasFactory;

    protected $table = 'product_deliveries';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = [];

    public function confirmations(){
        return $this->hasMany(Confirmation::class);
    }
}
