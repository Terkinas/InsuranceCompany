<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function store(Request $request) {
        $validated = $request->validate([
            'squares' => 'required|max:10',
            'address' => 'required|max:255',
            'client_id',
            'about' => 'max:255',
            'verified',
            'fileUpload' => 'required|mimes:jpg,png,jpeg'
        ]);

        $newImageName = time() . '-' . $request->address . '-' . $request->squares . 
        $request->fileUpload->extension();

        $request->fileUpload->move(public_path('images'), $newImageName);

        House::create([
            'squares' => request('squares'),
            'address' => request('address'),
            'client_id' => Clients::select('id')->where('user_id', auth()->id())->first()->id,
            'about' => request('about'),
            'verified' => false,
            'image_path' => $newImageName
        ]);

        return redirect('/dashboard');
    }

    public function editForm($id) {
            $housesArray = House::where('client_id', Clients::where('user_id', auth()->id())->first()->id)->pluck('id');
    
            foreach ($housesArray as $item) {
                if($item == $id) {
                    $house = House::where('id', $id)->first();
                    return view('pages.editBustas', compact('house'));
                }
                else {
                    $house = null;
                }
            }
    
    
            if(House::where('client_id', Clients::where('user_id', auth()->id())->first()->id)->pluck('id') == $id) {
            }
            else {
                dd ("does not belong to you");
                redirect("/");
            }

    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'squares' => 'required|max:10',
            'address' => 'required|max:255',
            'client_id',
            'about' => 'max:255',
            'verified'
        ]);

        $house = House::where('id', $id)->firstOrFail();
        $house->squares = request('squares');
        $house->address = request('address');
        $house->about = request('about');

        $house->save();

        return redirect('/profilis')->with('success');
    }



    public function deleteConfirmation($id) {
        $houseArray =House::where('client_id', Clients::where('user_id', auth()->id())->first()->id)->pluck('id');

        foreach ($houseArray as $item) {
            if($item == $id) {
                $house = House::where('id', $id)->first();

                return view('pages.deleteBustas', compact('house'));
            }
            else {
                $house = null;
            }
        }
    }

    public function destroy($id) {
        $houseArray =House::where('client_id', Clients::where('user_id', auth()->id())->first()->id)->pluck('id');
        foreach ($houseArray as $item) {
            if($item == $id) {
                $house = House::find($id);
                $house->delete();

                return redirect("/profilis")->with('success');
            }
            else {
                $house = null;
            }
        }
    }

    
}
