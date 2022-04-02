<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Clients;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Extension\Attributes\Node\Attributes;

class CarsController extends Controller
{
    public function store(Request $request) {

        $validated = $request-> validate([
            'brand' => 'required|max:255',
            'year' => 'required|max:255',
            'power' => 'required|max:255',
            'regnr' => 'required|max:255',
            'about' => 'required|max:255',
            'client_id',
            'verified'
        ]);

    

        Car::create([
            'brand' => request('brand'),
            'year' => request('year'),
            'power' => request('power'),
            'regnr' => request('regnr'),
            'about' => request('about'),
            'client_id' => Clients::select('id')->where('user_id', auth()->id())->first()->id,
            'verified' => false
        ]);

        return redirect('/dashboard');
    }
}
