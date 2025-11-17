<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\City;
use Livewire\Attributes\Url;

class FilterForm extends Component
{
    public $cities = [];

    #[Url]
    public $city = '';  // Default value

    #[Url]
    public $property_type = '';  // Default value

    #[Url]
    public $operation = '';  // Default value

    #[Url]
    public $price_min = "";  // Default value

    #[Url]
    public $price_max = "";  // Default value

    public function mount()
    {
        $this->cities = City::all()->map(function ($city) {
            return ['value' => (string) $city->id, 'label' => $city->name];
        })->toArray();
    }

    public function render()
    {
        return view('livewire.filter-form');
    }
}
