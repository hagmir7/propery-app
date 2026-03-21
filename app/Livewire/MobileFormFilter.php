<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\City;
use Livewire\Attributes\Url;

class MobileFormFilter extends Component
{
    public $cities = [];

    #[Url]
    public $city = '';

    #[Url]
    public $property_type = '';

    #[Url]
    public $operation = '';

    #[Url]
    public $price_min = "";

    #[Url]
    public $price_max = "";

    public function mount()
    {
        $this->cities = City::all()->map(function ($city) {
            return ['value' => (string) $city->id, 'label' => $city->name];
        })->toArray();
    }



    public function render()
    {
        return view('livewire.mobile-form-filter');
    }
}
