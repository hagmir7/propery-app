<?php

use App\Models\Property;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $properties = Property::all();
    return view('welcome', compact('properties'));
})->name('home');
