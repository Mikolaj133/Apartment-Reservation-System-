<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\BookingHistory;
use App\Models\Reservation;
use App\Models\Reviews;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function statistics(Request $request)
    {
        $allTimeReservations = Reservation::where('status', 'confirmed')->count();

        $canceledReservations = Reservation::where('status', 'canceled')->count();

        $mostPopularApartment = Reservation::select('apartment_id', DB::raw('COUNT(*) as total_reservations'))
            ->where('status', 'confirmed')
            ->groupBy('apartment_id')
            ->orderByDesc('total_reservations')
            ->first();

        $allTimeEarnings = BookingHistory::where('status' , 'confirmed')->sum('deposit');

        $monthlyEarnings = BookingHistory::select(
            DB::raw('strftime("%Y", created_at) as year'),
            DB::raw('strftime("%m", created_at) as month'),
            DB::raw('SUM(deposit) as total_earnings')
        )
            ->where('status', 'confirmed')
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        $yearlyEarnings = BookingHistory::select(
            DB::raw('strftime("%Y", created_at) as year'),
            DB::raw('SUM(deposit) as total_earnings')
        )
            ->where('status', 'confirmed')
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->get();

        return view('admin-panel.statistic', [
            'allTimeReservations' => $allTimeReservations,
            'canceledReservations' => $canceledReservations,
            'mostPopularApartment' => $mostPopularApartment,
            'allTimeEarnings' => $allTimeEarnings,
            'monthlyEarnings' => $monthlyEarnings,
            'yearlyEarnings' => $yearlyEarnings,
        ]);
    }

    public function generateReport(Request $request)
    {
        $startDate = $request->input('date_from');
        $endDate = $request->input('date_to');

        $reservations = Reservation::whereBetween('created_at', [$startDate, $endDate])
            ->get();

        $reviews = Reviews::whereBetween('created_at', [$startDate, $endDate])
            ->get();

        $apartments = Apartment::whereBetween('created_at', [$startDate, $endDate])
            ->get();

        $users = User::whereBetween('created_at', [$startDate, $endDate])
            ->get();

        $totalUsersDuringPeriod = User::whereBetween('created_at', [$startDate, $endDate])->count();
        $totalReviews = Reviews::whereBetween('created_at' , [$startDate , $endDate])->count();
        $avgRating = Reviews::whereBetween('created_at' , [$startDate , $endDate])->avg('rating');
        $totalReservations = Reservation::whereBetween('created_at' , [$startDate , $endDate])->count();
        $totalApartments = Apartment::whereBetween('created_at' , [$startDate , $endDate])->count();
        $totalEarnings = Reservation::whereBetween('created_at', [$startDate , $endDate])->sum('deposit');


        return view('admin-panel.statistics-report', [
            'reservations' => $reservations,
            'reviews' => $reviews,
            'apartments' => $apartments,
            'users' => $users,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'totalUsersDuringPeriod' => $totalUsersDuringPeriod,
            'totalReviews' => $totalReviews,
            'avgRating' => $avgRating,
            'totalReservations'  => $totalReservations,
            'totalApartments' => $totalApartments,
            'totalEarnings' => $totalEarnings,
        ]);
    }
}
