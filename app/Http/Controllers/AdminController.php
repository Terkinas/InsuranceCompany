<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Clients;
use App\Models\House;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    
    public function index() {
        if(auth()->user()->admin) {
            return view('pages.adminmenu');
        }
        else {
            return redirect('/');
        }
    }

    public function clientsReq() {
        if(Clients::where('user_id', auth()->id())->first()) {
            $clients = User::all();

            
            foreach($clients as $client) {
                // $cars[$client->id] = Car::where('client_id', Clients::where('user_id', $client->id)->firstOrFail()->id)->get();

                // $houses[$client->id] = House::where('client_id', Clients::where('user_id', $client->id)->firstOrFail()->id)->get();
                // $cars[$client->id] = Car::where('client_id', $client->id);
                // $houses[$client->id] = House::where('client_id', $client->id);
                $cars[$client->id] = Car::all();
                $houses[$client->id] = House::all();
            }
            // $wealthVerified = Car::where('client_id', Clients::where('user_id', auth()->id())->first()->id)->get();
            // $housesVerified = House::where('client_id', Clients::where('user_id', auth()->id())->first()->id)->get();
        }
        else {
            $cars = []; 
            $houses = [];
        }
        
        // foreach($clients as $client) {
        //     if($client->id == 3) {
        //         dd($cars[1]);
        //     }
        // } 

        // foreach($clients as $client) {
        //     dd($cars[$client->id]->get()->id);
        // }
           
        return view('pages.clientsforms', compact('cars', 'houses', 'clients'));
    }
}
