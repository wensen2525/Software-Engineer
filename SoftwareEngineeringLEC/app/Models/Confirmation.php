<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Confirmation extends Model
{
    use HasFactory;
    protected $table = 'confirmations';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = [];

    public function checkone(){
        return $this->belongsTo(CheckOne::class);
    }
    public function cart(){
        return $this->belongsTo(Cart::class);
    }
    public function paymentmethod(){
        return $this->belongsTo(PaymentMethod::class);
    }
    public function address(){
        return $this->belongsTo(Address::class);
    }
    public function productdelivery(){
        return $this->belongsTo(ProductDelivery::class);
    }
}
