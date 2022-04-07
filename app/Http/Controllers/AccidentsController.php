<?php

namespace App\Http\Controllers;

use App\Models\Accidents;
use App\Models\Car;
use App\Models\Clients;
use App\Models\House;
use App\Models\HouseAccidents;
use Illuminate\Http\Request;

class AccidentsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index() {
        if(Clients::where('user_id', auth()->id())->first()) {
            $wealthVerified = Car::where('client_id', Clients::where('user_id', auth()->id())->first()->id)->get();
            $housesVerified = House::where('client_id', Clients::where('user_id', auth()->id())->first()->id)->get();
        }
        else {
            $wealthVerified = []; 
            $housesVerified = [];
        }
           
        return view('pages.pranesimoForma', compact('wealthVerified', 'housesVerified'));
    }

    public function formCar($id) {
        // $car = Car::where('id', Clients::where('user_id', auth()->id())->first()->id)->first();
        $car = Car::find($id);
        if($car->client_id == Clients::where('user_id', auth()->id())->first()->id ) {
            return view('pages.carAccidentForm', compact('car'));
        }
        else {
            return redirect('/');
        }
    }

    public function formHouse($id) {
        // $car = Car::where('id', Clients::where('user_id', auth()->id())->first()->id)->first();
        $house = House::find($id);
        if($house->client_id == Clients::where('user_id', auth()->id())->first()->id ) {
            return view('pages.houseAccidentForm', compact('house'));
        }
        else {
            return redirect('/');
        }

    }

    public function submitFormCar(Request $request, $id) {
        if(Car::find($id)->id == Clients::where('user_id', auth()->id())->first()->id ) {
            return redirect('/');
        }
        $validated = $request-> validate([
            'about' => 'max:255',
        ]);
    

        Accidents::create([
            'about' => request('about'),
            'car_id' => Car::find($id)->id,
            'paid' => false,
            'cancelled' => false
        ]);

        return redirect('/dashboard');
    }

    public function submitFormHouse(Request $request, $id) {
        if(House::find($id)->id == Clients::where('user_id', auth()->id())->first()->id ) {
            return redirect('/');
        }
        $validated = $request-> validate([
            'about' => 'max:255',
        ]);
    

        HouseAccidents::create([
            'about' => request('about'),
            'house_id' => House::find($id)->id,
            'paid' => false,
            'cancelled' => false
        ]);

        return redirect('/dashboard');
    }
}
