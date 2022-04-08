<?php

namespace App\Http\Controllers;

use App\Models\Accidents;
use App\Models\Car;
use App\Models\Clients;
use App\Models\House;
use App\Models\HouseAccidents;
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

    public function req_deletion($item, $id) {
        if(auth()->user()->admin) {
            if($item == 'car') {
                $car = Car::find($id);
                 $car->delete();
            } 
            else if($item == 'house') {
                $house = House::find($id);
                 $house->delete();
            }
            

            return redirect('/admin/clients/requests');
        }
    }

    public function req_confirmation($item, $id) {
        if(auth()->user()->admin) {

            if($item == 'car') {
                $post = Car::where('id', $id)->firstOrFail();
                $post->verified = true;
                $post->save();
            }
            else if($item == 'house') {
                $post = House::where('id', $id)->firstOrFail();
                $post->verified = true;
                $post->save();
            }
            return redirect('/admin/clients/requests');
        }
    }

    public function indexUsers() {
        if(auth()->user()->admin) {
            // $users = User::all();
            $users = User::orderBy('admin', 'DESC')->get();
            return view('pages.usersmenu', compact('users'));
        }
    }

    public function deleteUser($id) {
        if(auth()->user()->admin) {
            $user = User::find($id);
            if($user->id != 1) {
                $user->delete();
            }
            
            return view('usersmenu');
        }
    }

    public function makeAdmin($id) {
        if(auth()->user()->admin) {
            $user = User::find($id);
            if($user->id != 1) {
                $user->admin = !$user->admin;
                $user->save();
            }
          

            return redirect()->route('usersmenu');
        }
    }

    public function findUser() {
        if(auth()->user()->admin) {
            $users = User::where('email', 'LIKE', '%'.$_GET['email'].'%')->get();

            return view('pages.usersmenu', compact('users'));
        }
    }

    public function show_accidents() {
        $accidentsCars = Accidents::get()->pluck('car_id')->toArray();
        $cars = Car::whereIn('id', $accidentsCars)->get();
        $accidentsCars = Accidents::where('about', '!=', '')->get();
        
    
        $accidentsHouses = HouseAccidents::get()->pluck('house_id')->toArray();
        $houses = House::whereIn('id', $accidentsHouses)->get();
        $accidentsHouses = HouseAccidents::where('about', '!=', '')->get();

        return view('pages.clients_accidents', compact('cars', 'houses', 'accidentsCars', 'accidentsHouses'));
    }
}