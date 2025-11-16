<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\City;

class FilterForm extends Component
{
    public $cities = [];

    public function mount()
    {
        // Option 1: Using pluck (key-value pairs)
        $this->cities = City::pluck('name', 'id')->toArray();

        // Option 2: If you need objects with 'value' and 'name' keys
        // $this->cities = City::all()->map(function($city) {
        //     return ['value' => $city->id, 'name' => $city->name];
        // })->toArray();
    }

    public function render()
    {
        return view('livewire.filter-form');
    }
}
