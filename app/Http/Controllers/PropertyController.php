<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function show(Property $property){
        $property->load(['images', 'city']);
        $title = $property->title;
        return view('property.show', compact('property', 'title'));
    }
}
