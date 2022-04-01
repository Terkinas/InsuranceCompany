<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function store(Request $request) {
        $validated = $request -> validate([
            'Identity Number' => 'required|max:42',
            'Address' => 'required|max:255',
            'FK_UserID',
        ]);

        Clients::create([
            'Identity Number' => request('Identity Number'),
            'Address' => request('Address'),
            'FK_UserID' => request('FK_UserID')
        ]);

        return redirect('/dashboard');
    }
}
