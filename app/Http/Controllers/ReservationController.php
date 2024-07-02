<?php

namespace App\Http\Controllers;

use App\Mail\AvailableDate;
use App\Models\BookingHistory;
use App\Models\Queue;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{

    public function index()
    {
        $reservations = Reservation::where('user_id', Auth::id())
            ->with('apartment')
            ->get();

        return view('reservations.index', compact('reservations'));
    }

//    public function store(Request $request)
//    {
//
//        $userId = auth()->user()->id;
//        $apartmentId = $request->input('apartment_id');
//        $dateFrom = $request->input('date_from');
//        $dateTo = $request->input('date_to');
//
//        $overlappingReservations = DB::table('reservations')
//            ->where('apartment_id', $apartmentId)
//            ->where(function ($query) use ($dateFrom, $dateTo) {
//                $query->whereBetween('date_from', [$dateFrom, $dateTo])
//                    ->orWhereBetween('date_to', [$dateFrom, $dateTo])
//                    ->orWhere(function ($query) use ($dateFrom, $dateTo) {
//                        $query->where('date_from', '<=', $dateFrom)
//                            ->where('date_to', '>=', $dateTo);
//                    });
//            })
//            ->get();
//
//        $request->session()->put('reservation_data', [
//            'user_id' => $userId,
//            'apartment_id' => $apartmentId,
//            'date_from' => $dateFrom,
//            'date_to' => $dateTo,
//        ]);
//
//        if ($overlappingReservations->isNotEmpty()) {
//            $firstOverlappingReservation = $overlappingReservations->first();
//            $reservationId = $firstOverlappingReservation->id;
//            $request->session()->put('reservation_data.reservation_id', $reservationId);
//
//            return view('apartments.overlap-reservation');
//        } else {
//            $reservation = Reservation::create([
//                'date_from' => $dateFrom,
//                'date_to' => $dateTo,
//                'apartment_id' => $apartmentId,
//                'user_id' => $userId,
//                'deposit' => $request->input('price'),
//                'status' => 'pending',
//            ]);
//
//            $reservationId = $reservation->id;
//            $request->session()->put('reservation_data.reservation_id', $reservationId);
//
//            return redirect()->route('apartments.index')->with('success', 'Reservation created successfully.');
//        }
//    }

    public function store(Request $request)
    {
        $userId = auth()->user()->id;
        $apartmentId = $request->input('apartment_id');
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');

        // Validation for dates
        $today = now()->toDateString();
        $request->validate([
            'date_from' => 'required|date|after_or_equal:' . $today,
            'date_to' => 'required|date|after:date_from',
        ]);

        // Check for overlapping reservations
        $overlappingReservations = DB::table('reservations')
            ->where('apartment_id', $apartmentId)
            ->where(function ($query) use ($dateFrom, $dateTo) {
                $query->whereBetween('date_from', [$dateFrom, $dateTo])
                    ->orWhereBetween('date_to', [$dateFrom, $dateTo])
                    ->orWhere(function ($query) use ($dateFrom, $dateTo) {
                        $query->where('date_from', '<=', $dateFrom)
                            ->where('date_to', '>=', $dateTo);
                    });
            })
            ->get();

        $request->session()->put('reservation_data', [
            'user_id' => $userId,
            'apartment_id' => $apartmentId,
            'date_from' => $dateFrom,
            'date_to' => $dateTo,
        ]);

        if ($overlappingReservations->isNotEmpty()) {
            $firstOverlappingReservation = $overlappingReservations->first();
            $reservationId = $firstOverlappingReservation->id;
            $request->session()->put('reservation_data.reservation_id', $reservationId);

            return view('apartments.overlap-reservation');
        } else {
            $reservation = Reservation::create([
                'date_from' => $dateFrom,
                'date_to' => $dateTo,
                'apartment_id' => $apartmentId,
                'user_id' => $userId,
                'deposit' => $request->input('price'),
                'status' => 'pending',
            ]);

            $reservationId = $reservation->id;
            $request->session()->put('reservation_data.reservation_id', $reservationId);

            return redirect()->route('apartments.index')->with('success', 'Reservation created successfully.');
        }
    }




    public function destroy(Request $request, $id)
    {
        $userId = auth()->user()->id;



        BookingHistory::create([
            'date_from' => $request->input('date_from'),
            'date_to' => $request->input('date_to'),
            'apartment_id' => $request->input('apartment_id'),
            'user_id' => $userId,
            'deposit' => $request->input('deposit'),
            'status' => 'canceled'
        ]);



        $reservation = Reservation::where('id', $id)
            ->where('apartment_id', $request->input('apartment_id'))
            ->where('user_id', $userId)
            ->first();

        if ($reservation) {
            $reservation->delete();

            $queueEntries = Queue::where('apartment_id', $reservation->apartment_id)
                ->where('reservation_id', $id)
                ->orderBy('position')
                ->first();
            $user = User::find($queueEntries->user_id);

            if ($queueEntries) {
                $firstInQueue = $queueEntries->first();

                Mail::to($user -> email)->send(new AvailableDate());
            }

            return redirect()->route('reservations.index')->with('success', 'Reservation canceled successfully.');
        } else {
            return redirect()->route('reservations.index')->with('error', 'Reservation not found or you do not have permission to cancel it.');
        }

    }



    public function update(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);

        $request->validate([
            'date_from' => 'required|date|after_or_equal:today',
            'date_to' => 'required|date|after:date_from',
        ]);

        $reservation->update([
            'date_from' => $request->date_from,
            'date_to' => $request->date_to,
        ]);

        return redirect()->route('reservations.index')->with('success', 'Reservation updated successfully.');
    }

    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        $user = auth()->user();
        if($user->is_admin){
            return view('admin-panel.edit-reservation' , compact('reservation'));
        }
        return view('reservations.edit', compact('reservation'));
    }




    public function adminUpdate(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);

        // Validate input fields
        $request->validate([
            'date_from' => 'required|date|after_or_equal:today',
            'date_to' => 'required|date|after:date_from',
            'status' => 'required|in:pending,confirmed,canceled',
        ]);

        // Update date fields
        $reservation->update([
            'date_from' => $request->date_from,
            'date_to' => $request->date_to,
        ]);

        // Update status field
        $reservation->update([
            'status' => $request->status,
        ]);

        // Handle additional logic for canceled reservations
        if ($request->status === 'canceled') {
            BookingHistory::create([
                'date_from' => $request->input('date_from'),
                'date_to' => $request->input('date_to'),
                'apartment_id' => $reservation->apartment_id,
                'user_id' => $reservation->user_id,
                'deposit' => $reservation->deposit,
                'status' => 'canceled',
            ]);
        }

        $reservation->delete();

        return redirect()->route('reservations.index')
            ->with('success', 'Reservation updated successfully.');
    }
    public function showRateForm($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('rate-reservation', compact('reservation'));
    }


    public function rate(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $reservation = Reservation::findOrFail($id);
        $reservation->rating = $request->input('rating');
        $reservation->save();

        return redirect()->route('some.route')->with('success', 'Rating submitted successfully.');
    }


    //all reservation for admin panel
    public function allReservation(){
        $reservation = Reservation::all();

        return view('admin-panel.reservation-management' , compact('reservation'));
    }



    public function __invoke()
    {
//        $events = [];
//
//        $appointments = Appointment::with(['client', 'employee'])->get();
//
//        foreach ($appointments as $appointment) {
//            $events[] = [
//                'title' => $appointment->client->name . ' ('.$appointment->employee->name.')',
//                'start' => $appointment->start_time,
//                'end' => $appointment->finish_time,
//            ];
//        }
//
//        return view('show', compact('events'));
    }
}
