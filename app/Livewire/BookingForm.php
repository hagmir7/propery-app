<?php

namespace App\Livewire;

use App\Models\Booking;
use Livewire\Component;

class BookingForm extends Component
{
    public $property;
    public $date;
    public $phone;
    public $email;
    public $full_name;
    public $start_date;
    public $end_date;

    protected $rules = [
        'full_name'   => 'required|string|max:255',
        'phone'       => 'required|string|max:20',
        'email'       => 'nullable|email',
        'date'    => 'required|date',
    ];

    public function mount($property)
    {
        $this->property = $property->id;
    }

    public function submit()
    {
        $this->validate();

        Booking::create([
            'property_id' => $this->property,
            'date'        => now(),
            'phone'       => $this->phone,
            'email'       => $this->email,
            'full_name'   => $this->full_name,
            'date'    => $this->date,
        ]);

        $this->reset(['phone', 'email', 'full_name', 'date']);

        session()->flash('success', 'Votre réservation a été envoyée avec succès !');
    }

    public function render()
    {
        return view('livewire.booking-form');
    }
}
