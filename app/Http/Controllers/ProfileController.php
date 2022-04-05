<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Clients;
use App\Models\House;
use Attribute;
use Error;
use Illuminate\Http\Request;
use League\CommonMark\Extension\Attributes\Node\Attributes;

class ProfileController extends Controller
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
           
        return view('pages.profile', compact('wealthVerified', 'housesVerified'));
    }
}
