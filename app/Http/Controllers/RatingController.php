<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function showRatingForm(Request $request)
    {
        $rating = $request->query('rating', null);
        return view('rate-reservation', compact('rating'));
    }

    public function submitRating(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comments' => [
                'nullable',
                'string',
                'max:255',
                'regex:/^[a-zA-Z0-9\s]*$/'
            ],
        ]);

        Reviews::create([
            'user_id' => $request->user_id,
            'rating' => $request->rating,
            'review' => $request->comments,
        ]);

        return redirect()->route('rate.show')->with('success', 'Thank you for your feedback!');
    }
}


