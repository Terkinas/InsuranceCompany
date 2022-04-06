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
        if(auth()->user()->admin) {
            $clients = User::all();

            
            foreach($clients as $client) {
                $cars = Car::all();
                $houses = House::all();
            }
           
        return view('pages.clientsforms', compact('cars', 'houses', 'clients'));
        } else {
            return redirect('/');
        }
    }

    public function req_confirmation($id) {
        if(auth()->user()->admin) {
            $car = Car::find($id);
            $car->delete();

            return redirect('clients_requests');
        }
    }




}