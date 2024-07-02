<?php

namespace App\Http\Controllers;

use App\Models\Queue;
use Illuminate\Http\Request;

class QueueController extends Controller
{
    public function store(Request $request){

        $reservationData = $request->session()->get('reservation_data');


        if($request->input('decision') === 'yes'){

            $position = Queue::where('apartment_id', $request->input('apartment_id'))->max('position');


            if($position == null){
                $position = 1;
            }
            else{
                $position += 1;
            }

            Queue::create([
                'date_from' => $reservationData['date_from'],
                'date_to' => $reservationData['date_to'],
                'apartment_id' => $reservationData['apartment_id'],
                'user_id' => $reservationData['user_id'],
                'reservation_id' => $reservationData['reservation_id'],
                'position' => $position
            ]);

            return redirect('/apartments')
                ->with('success', 'You have been added to the waiting list with position '  .$position. '.');
        } else {
            return redirect('overlap-reservation' . $request->input('apartment_id'))
                ->with('info', 'You chose not to join the waiting list.');
        }

    }
    public function __invoke(){

    }
}
