<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'apartment_id',
        'percentage',
        'valid_from',
        'valid_to',
    ];

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }
}
