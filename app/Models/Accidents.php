<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accidents extends Model
{
    use HasFactory;

    protected $fillable = [
        'about',
        'car_id',
        'paid',
        'cancelled'
    ];
}
