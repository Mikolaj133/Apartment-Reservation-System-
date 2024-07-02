<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\RatingController;
use App\Models\Reservation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ReservationController;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//Route::get('/test-email', function () {
//    $reservation = Reservation::first(); // Replace with an actual reservation ID
//
//    if ($reservation) {
//        Mail::to('test@example.com')->send(new \App\Mail\PaymentRemainder($reservation));
//        return 'Email sent!';
//    } else {
//        return 'Reservation not found';
//    }
//});
//
//Route::get('/rate-reservation/{id}' , function (){
//    $reservation = Reservation::first();
//
//    if($reservation){
//        Mail::to('test@example.com')->send(new \App\Mail\RatingRequest($reservation));
//        return 'Email seensentuioan';
//    }else{
//        return "reservation not found";
//    }
//});
//Route::get('/vacant-term' , function (){
//
//});


//submitting the form in the email
//Route::post('/rate-service', [RatingController::class, 'store'])->name('mail.rating-request');
Route::get('/rate', [RatingController::class, 'showRatingForm'])->name('rate.show');
Route::post('/rate', [RatingController::class, 'submitRating'])->name('rate.submit');



//Route::get('/rate-reservation/{id}', [ReservationController::class, 'showRateForm'])->name('rate-reservation.form');
//Route::post('/rate-reservation/{id}', [RatingController::class, 'rate'])->name('rate-reservation');


//Route::get('calendar' , \App\Http\Controllers\CalendarController::class)->name('show');

//Route::get('/apartments/{apartment}/availability', 'ApartmentController@availability');

//Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');

//Route::post('/apartment/{id}/reservation' , ReservationController::class);

//Route::post('/apartments/{apartment}/reservation', 'ReservationController@store')->name('apartments.reservation');

Route::middleware(['auth'])->group(function () {
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
});
//Route::middleware(['auth', 'isAdmin'])->group(function () {
//    Route::get('/admin/users', [AdminController::class, 'viewAllUsers'])->name('admin.users.index');
//    Route::get('/admin/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
//    Route::patch('/admin/users/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');
//});





Route::middleware('auth')->group(function () {

    Route::resource('apartments' , ApartmentController::class);
    Route::post('/reservation', [ReservationController::class, 'store'])->name('reservations.store');

    Route::delete('/reservation/{id}',[ReservationController::class, 'destroy'])->name('reservations.destroy');

    Route::get('/reservations/{id}/edit', [ReservationController::class, 'edit'])->name('reservations.edit');
    Route::patch('/reservations/{id}', [ReservationController::class, 'update'])->name('reservations.update');


    Route::get('/overlap-reservation', [QueueController::class, 'store'])->name('queue.store');

    Route::get('/apartments-filter' , [ApartmentController::class , 'filter'])->name('apartment.filter');


//    Route::get('/apartments/{apartment}/availability', [ApartmentController::class, 'availability'])
//        ->name('apartments.availability');
    Route::get('/apartments/{id}/availability', [ApartmentController::class, 'getAvailability']);



    Route::patch('/profile/deposit', [ProfileController::class, 'deposit'])->name('profile.deposit'); // Specific route for deposit
    Route::get('/reservations/insufficient', [ProfileController::class, 'insufficientBalance'])->name('profile.insufficient.balance');


    //ADMIN PANEL ROUTES
    Route::get('/admin-panel' , [\App\Http\Controllers\BookingHistoryController::class , 'history'])->name('history.history');
    Route::get('/admin-panel/account-management' , [ProfileController::class , 'index'])->name('account-management.index');
    Route::get('/admin-panel/statistics' , [\App\Http\Controllers\StatisticController::class , 'statistics'])->name('statistics.statistics');
    Route::post('/admin-panel/statistics/report' , [\App\Http\Controllers\StatisticController::class , 'generateReport'])->name('statistics.report');
    Route::get('/admin-panel/reservation-management' , [ReservationController::class , 'allReservation'])->name('edit-reservation');
//    Route::get('/admin-panel/reservation-management' , [ReservationController::class , 'allReservation'])->name('edit-reservation');
    Route::get('/admin/reservation/{id}/edit' , [ReservationController::class , 'edit'])->name('admin.reservation.edit');
    Route::patch('/admin/reservation/{id}' , [ReservationController::class , 'adminUpdate'])->name('admin.reservation.update');


    Route::get('/admin-panel/discount' , [\App\Http\Controllers\DiscountController::class , 'index'])->name('discount.index');
    Route::get('/admin-panel/discount/create' , [\App\Http\Controllers\DiscountController::class , 'create'])->name('discount.create');
    Route::post('/admin-panel/discount', [\App\Http\Controllers\DiscountController::class, 'store'])->name('discount.store');
    Route::get('/admin-panel/discount/{id}/edit', [\App\Http\Controllers\DiscountController::class, 'edit'])->name('discount.edit');
    Route::patch('/admin-panel/discount/{id}', [\App\Http\Controllers\DiscountController::class, 'update'])->name('discount.update');
    Route::delete('/admin-panel/discount/{id}', [\App\Http\Controllers\DiscountController::class, 'destroy'])->name('discount.destroy');




    Route::get('/admin/users', [AdminController::class, 'viewAllUsers'])->name('admin.users.index');
    Route::get('/admin/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::patch('/admin/users/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');



//    Route::get('/profile' , [ProfileController::class, 'history'])->name('profile.history');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

