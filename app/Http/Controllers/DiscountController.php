<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::with('apartment')->get();
        return view('admin-panel.discounts.index', compact('discounts'));
    }

    public function create()
    {
        $apartments = Apartment::all();
        return view('admin-panel.discounts.create', compact('apartments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'apartment_id' => 'required|exists:apartments,id',
            'percentage' => 'required|integer|between:1,100',
            'valid_from' => 'required|date',
            'valid_to' => 'required|date|after_or_equal:valid_from',
        ]);



        Discount::create($request->only('apartment_id', 'percentage', 'valid_from', 'valid_to'));


//        $apartment = DB::table('apartments')
//            ->where('id' ,[$request->input('apartment_id')])
//            ->get();
//
//        if($apartment){ //price could be wrong name
//            $newPrice = $apartment->price - ($apartment->price * ($request->input('percentage')/ 100));
//
//            DB::table('apartments')
//                ->where('id' , $request->input('apartment_id'))
//                ->update(['price_per_night' => $newPrice]);
//        }
        $apartment = Apartment::findOrFail($request->input('apartment_id'));

        // Calculate the new price based on the discount
        $newPrice = $apartment->price_per_night - ($apartment->price_per_night * ($request->input('percentage') / 100));

        // Update the apartment's price in the database
        $apartment->price_per_night = $newPrice;
        $apartment->save();


        return redirect()->route('discount.index')->with('success', 'Discount created successfully.');
    }

    public function edit($id)
    {
        $discount = Discount::findOrFail($id);
        $apartments = Apartment::all();
        return view('admin-panel.discounts.edit', compact('discount', 'apartments'));
    }

    public function update(Request $request, $id)
    {
        //idk if this is important for that , it will need to change prices in db after update
        $request->validate([
            'apartment_id' => 'required|exists:apartments,id',
            'percentage' => 'required|integer|between:1,100',
            'valid_from' => 'required|date',
            'valid_to' => 'required|date|after_or_equal:valid_from',
        ]);


        $discount = Discount::findOrFail($id);
        $discount->update($request->all());
        return redirect()->route('discount.index')->with('success', 'Discount updated successfully.');
    }

    public function destroy($id)
    {
        $discount = Discount::findOrFail($id);

        $apartment = Apartment::findorFail($discount->apartment_id);
        $apartment->price_per_night = $apartment->original_price;
        $apartment->save();

        $discount->delete();


        return redirect()->route('discount.index')->with('success', 'Discount deleted successfully.');
    }
}
