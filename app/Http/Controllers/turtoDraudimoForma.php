<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;

class turtoDraudimoForma extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }


    function index() {
        $checkIfVerified = Clients::where('user_id', auth()->id())->get();

        return view('pages.turtoDraudimoForma', compact('checkIfVerified')); 
    }

    function formType() {

        $checkIfVerified = Clients::where('user_id', auth()->id())->get();
        $type = $_GET['kategorija'];
        return view('pages.turtoDraudimoForma', compact('type', 'checkIfVerified'));      
    }

    

    function verifyUser(Request $req) {   
        $validated = $req->validate([
            'AsmensKodas' => 'required|max:255',
            'address' => 'required|max:255',
        ]);
        
        Clients::create([
            'Identity Number' => request('AsmensKodas'),
            'Address' => request('address'),
            'user_id' => auth()->id()
        ]);

        return redirect('/dashboard')->with('success');
    }
}
