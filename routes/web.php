<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PropertyController;
use App\Models\City;
use App\Models\Property;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $query = Property::query();

    if (request()->filled('city')) {
        $query->where('city_id', request('city'));
    }

    if (request()->filled('property_type')) {
        $query->where('property_type_id', request('property_type'));
    }

    if (request()->filled('operation')) {
        $query->where('operation_type', request('operation'));
        // Example: 1 = Vente, 2 = Location
    }

    if (request()->filled('price_min')) {
        $query->where('price', '>=', request('price_min'));
    }

    if (request()->filled('price_max')) {
        $query->where('price', '<=', request('price_max'));
    }

    $properties = $query->paginate(20);
    $cities = City::all()->map(function ($city) {
        return ['value' => (string) $city->id, 'label' => $city->name];
    })->toArray();

    $title = "Vente et location d’appartements, villas, maisons, terrains.";

    return view('welcome', compact('properties', 'cities', 'title'));
})->name('home');


Route::get('property/{property:slug}', [PropertyController::class, 'show'])->name('property.show');
Route::get('page/{page:slug}', [PageController::class, 'show'])->name('page.show');
Route::get('contact', [ContactController::class, 'index'])->name('contact.index');


Route::get('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/');
})->name('logout');
