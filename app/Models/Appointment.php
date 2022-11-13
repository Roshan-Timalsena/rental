<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_status',
        'payment_method',
        'payment_status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function mechanic(){
        return $this->belongsTo(Mechanic::class);
    }
}
