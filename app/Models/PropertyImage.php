<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyImage extends Model
{
    // use SoftDeletes;

    protected $fillable = ['property_id', 'path', 'is_main'];


    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
