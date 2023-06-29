<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'addresses';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function confirmations(){
        return $this->hasMany(Confirmation::class);
    }
}
