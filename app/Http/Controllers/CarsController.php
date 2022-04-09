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
            'about' => 'max:255',
            'client_id',
            'verified',
            'fileUpload' => 'required|mimes:jpg,png,jpeg'
        ]);
        
        $newImageName = time() . '-' . $request->brand . '-' . $request->year . 
        $request->fileUpload->extension();

        $request->fileUpload->move(public_path('images'), $newImageName);

        Car::create([
            'brand' => request('brand'),
            'year' => request('year'),
            'power' => request('power'),
            'regnr' => request('regnr'),
            'about' => request('about'),
            'client_id' => Clients::select('id')->where('user_id', auth()->id())->first()->id,
            'verified' => false,
            'image_path' => $newImageName
        ]);

        return redirect('/dashboard');
    }


    public function editForm($id) {
        
        $carsArray =Car::where('client_id', Clients::where('user_id', auth()->id())->first()->id)->pluck('id');

        foreach ($carsArray as $item) {
            if($item == $id) {
                $car = Car::where('id', $id)->first();
                if($car->verified == true) {
                    return redirect()->route('profilis');
                }
                return view('pages.editAutomobilis', compact('car'));
            }
            else {
                $car = null;
            }
        }


        if(Car::where('client_id', Clients::where('user_id', auth()->id())->first()->id)->pluck('id') == $id) {
        }
        else {
            dd ("does not belong to you");
            redirect("/");
        }

        // return view('pages.editAutomobilis');
    }

    public function update(Request $request, $id) {
        $validated = $request-> validate([
            'brand' => 'required|max:255',
            'year' => 'required|max:255',
            'power' => 'required|max:255',
            'regnr' => 'required|max:255',
            'about' => 'max:255',
            'client_id',
            'verified'
        ]);

        $car = Car::where('id', $id)->firstOrFail();
        $car->brand = request('brand');
        $car->year = request('year');
        $car->power = request('power');
        $car->regnr = request('regnr');
        $car->about = request('about');

        $car->save();

        return redirect('/profilis')->with('success');
    }


    public function deleteConfirmation($id) {
        $carsArray =Car::where('client_id', Clients::where('user_id', auth()->id())->first()->id)->pluck('id');

        foreach ($carsArray as $item) {
            if($item == $id) {
                $car = Car::where('id', $id)->first();

                return view('pages.deleteAutomobilis', compact('car'));
            }
            else {
                $car = null;
            }
        }
    }

    public function destroy($id) {
        $carsArray =Car::where('client_id', Clients::where('user_id', auth()->id())->first()->id)->pluck('id');
        foreach ($carsArray as $item) {
            if($item == $id) {
                $car = Car::find($id);
                $car->delete();

                return redirect("/profilis")->with('success');
            }
            else {
                $car = null;
            }
        }
    }
}
