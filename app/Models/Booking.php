<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'property_id', 'start_date', 'end_date', 'status', 'date',
        'phone', 'email',
        'full_name'
    ];


    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'date' => 'date',
    ];


    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
