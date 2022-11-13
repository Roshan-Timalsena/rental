<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'rent_status',
        'payment_method',
        'payment_status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function bike(){
        return $this->belongsTo(Bike::class);
    }
}
