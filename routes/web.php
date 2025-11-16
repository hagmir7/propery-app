<?php

use App\Http\Controllers\PropertyController;
use App\Models\City;
use App\Models\Property;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $properties = Property::all();
    return view('welcome', compact('properties'));
})->name('home');


Route::get('property/{property:slug}', [PropertyController::class, 'show'])->name('property.show');
