<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function index(){
        $apartments = Apartment::paginate(50);

        return view('apartments.index' , [
            'apartments' => $apartments
        ]);
    }

    public function show(Apartment $apartment){
        return view('apartments.show' , ['apartment' => $apartment]);
    }

    public function filter(Request $request){

        $query = Apartment::query();

        if ($request->filled('person_quantity')) {
            $query->where('number_of_persons', '>=', $request->input('person_quantity'));
        }

        if ($request->filled('floor')) {
            $query->where('floor', '=', $request->input('floor'));
        }

        if ($request->filled('rooms')) {
            $query->where('rooms', '>=', $request->input('rooms'));
        }

        $apartments = $query->paginate(10);

        return view('apartments.index', compact('apartments'));
    }


    public function getAvailability($id)
    {
        $reservations = Reservation::where('apartment_id', $id)->get();

        $events = $reservations->map(function ($reservation) {
            return [
                'start' => $reservation->date_from,
                'end' => $reservation->date_to,
                'rendering' => 'background',
                'backgroundColor' => '#FF0000'
            ];
        });

        return response()->json($events);
    }
}
