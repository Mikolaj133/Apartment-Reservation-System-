<?php

namespace App\Http\Controllers;

use App\Models\BookingHistory;
use Illuminate\Http\Request;

class BookingHistoryController extends Controller
{
    public function history(){
        $history = BookingHistory::all();

        return view('admin-panel.history', compact('history'));
    }

}
