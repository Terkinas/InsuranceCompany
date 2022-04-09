<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'year',
        'power',
        'regnr',
        'about',
        'client_id',
        'verified',
        'image_path'
    ];
}
