<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckOne extends Model
{
    use HasFactory;
    protected $table = 'check_ones';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = [];

    public function size(){
        return $this->belongsTo(Size::class);
    }
    public function color(){
        return $this->belongsTo(Color::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function confirmations(){
        return $this->hasMany(Confirmation::class);
    }
}
