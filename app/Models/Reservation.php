<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
//    protected $fillable = ['date_from' , 'date_to'];
    protected $table = 'reservations';

    protected $guarded = [];


    //idk why this was coded here
    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }


//this is made because we want send an email to user that will remaind of payment
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
