<?php

namespace App\Livewire;

use App\Models\Booking;
use App\Models\Property;
use Livewire\Attributes\Validate;
use Livewire\Component;

class BookingForm extends Component
{

    public Property $property;


    #[Validate('required|string|max:255', "Nom complet")]
    public $full_name;

    #[Validate('required|string|max:20', "Téléphone")]
    public $phone;

    #[Validate('nullable|email|max:255', "E-mail")]
    public $email;

    #[Validate('required|date|after_or_equal:today', "Date")]
    public $date;



    public function submit()
    {
        $data = $this->validate();


        Booking::create([
            'property_id' => $this->property->id,
            'full_name'   => $data['full_name'],
            'phone'       => $data['phone'],
            'email'       => $data['email'] ?? null,
            'date'    => $data['date'],
        ]);

        $this->reset(['full_name', 'phone', 'email', 'date']);
        session()->flash('message', "Votre réservation a été envoyée avec succès ✔");
    }

    public function render()
    {
        return view('livewire.booking-form');
    }
}
