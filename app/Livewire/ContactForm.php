<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ContactForm extends Component
{

    #[Validate('required|string|max:100')]
    public $full_name;
    #[Validate('required|email|max:50')]
    public $email;
    #[Validate('required|string|max:150')]
    public $subject;
    #[Validate('required|string|max:600')]
    public $message;


    public function save()
    {
        $data = $this->validate();
        Contact::create($data);
        $this->reset();
        session()->flash('message', "Votre message a été envoyé avec succès ✔");
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
