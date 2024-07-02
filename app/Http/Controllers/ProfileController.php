<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\BookingHistory;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index()
    {
        $users = User::all();

        return view('admin-panel.account-management' , compact('users'));
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }


    //Pay the deposit
    //we need to take data from reservation table about the deposit and then
    //charge user from their saldo.
    public function deposit(Request $request)
    {
        // Assuming you have the user ID, possibly from the authenticated user
        $userId = auth()->user()->id;

        // Use the query builder to get the user's balance
        $user_balance = DB::table('users')
            ->where('id', $userId)
            ->value('saldo'); // Use the correct column name, such as 'balance' or 'saldo'

        $deposit = $request->input('deposit');

        // Check if the deposit amount is less than the user's balance
        if ($deposit <= $user_balance) {
            // Deduct the deposit amount from the user's balance
            $new_balance = $user_balance - $deposit;

            // Update the user's balance in the database
            DB::table('users')
                ->where('id', $userId)
                ->update(['saldo' => $new_balance]);

            //update status in database after user payment
            DB::table('reservations')
                ->where('id' , $request->input('reservation_id'))
                ->where('apartment_id' , $request->input('apartment_id'))
                ->update(['status' => 'confirmed']);

            BookingHistory::create([
                'date_from' => $request->input('date_from'),
                'date_to' => $request->input('date_to'),
                'apartment_id' => $request->input('apartment_id'),
                'user_id' => $userId,
                'deposit' => $deposit,
                'status' => 'confirmed'
            ]);
            return redirect()->route('reservations.index')->with('success' , 'Reservation paid succesfully');
        } else {
            return redirect()->route('profile.insufficient.balance');
        }
    }


//    public function history(){
//        $history = DB::table('booking_histories')
//            ->join('users', 'booking_histories.user_id', '=', 'users.id')
//            ->join('apartments', 'booking_histories.apartment_id', '=', 'apartments.id')
//            ->select('booking_histories.*', 'users.name as user_name', 'apartments.name as apartment_name')
//            ->get();
//
//        return view('profile.history' , compact('history'));
//    }

//    public function history()
//    {
//        // Get the authenticated user
//        $user = Auth::user();
//        //get me id of user
//
//
//        // Get all booking histories for the user
////       $history = BookingHistory::where('user_id' , Auth::id());
//
//        $history =BookingHistory::all();
//
//       dd($history);
//        // Pass the booking histories to the view
//        return view('profile.history', compact('history'));
//    }



    public function insufficientBalance()
    {
        return view('reservations.insufficient-funds');
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
