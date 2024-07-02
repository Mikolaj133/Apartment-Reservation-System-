<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Reviews;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $averageRating = Reviews::avg('rating');

        $availableDiscounts = Discount::get();

        return view('dashboard' , [
           'averageRating' => $averageRating,
           'availableDiscounts' => $availableDiscounts,
        ]);
    }
}
