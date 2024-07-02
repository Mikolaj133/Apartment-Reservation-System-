<?php

use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();


//Send here email with info of canceld reservation
\Illuminate\Support\Facades\Schedule::call(function (){
     DB::table('reservations')
        ->where('status' , 'pending')
        ->where('created_at', '<' , now()->subHours(24))
        ->delete();
})->everyMinute();


\Illuminate\Support\Facades\Schedule::call(function (){
   $remainderOfPayments = DB::table('reservations')
       ->where('status' , 'pending')
//       ->where('created_at' , '<' ,now()->subHours(20))
       ->get();

   foreach ($remainderOfPayments as $reservation){
       $user = DB::table('users')->where('id' , $reservation->user_id)->first();
       if($user){
           Mail::to($user -> email)->send(
               new \App\Mail\PaymentRemainder()
           );
       }

   }

})->everyMinute();

\Illuminate\Support\Facades\Schedule::call(function (){
   $reservations = DB::table('reservations')
   ->where('status' , 'confirmed')
//   ->where('data_to' , '<' , now()->subDays(1))
   ->get();

   foreach ($reservations as $reservation){
//       $user = DB::table('users')->where('id' , $reservation->user_id)->first();
       $user = User::find($reservation->user_id);
       if($user){
           Mail::to($user -> email)->send(
               new \App\Mail\RatingRequest($user)
           );
       }
   }
})->everyMinute();


//dodac taska ktory wysyka maila o anulowaniu rezerwacji



//\Illuminate\Support\Facades\Schedule::call(function (){
//    $canceledReservations = DB::table('history')
//        ->where('status' , 'canceled')
//        ->get();
//
//    foreach ($canceledReservations as $reservation) {
//        // Get the first user in the queue for the canceled apartment
//        $queueEntry = DB::table('queues')
//            ->where('apartment_id', $reservation->apartment_id)
//            ->orderBy('position')
//            ->first();
//
//        if ($queueEntry) {
//            $user = DB::table('users')->where('id', $queueEntry->user_id)->first();
//
//            if ($user) {
//                Mail::to($user->email)->send(
//                    new \App\Mail\AvailableDate()
//                );
//            }
//
//        }
//    }
//})->everyMinute();

