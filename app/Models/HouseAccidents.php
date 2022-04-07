<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseAccidents extends Model
{
    use HasFactory;

    protected $fillable = [
        'about',
        'house_id',
        'paid',
        'cancelled'
    ];
}
