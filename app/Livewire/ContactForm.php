<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ContactForm extends Component
{

    #[Validate('required|string|max:100', "Nom complet")]
    public $full_name;
    #[Validate('required|email|max:50', "E-mail")]
    public $email;
    #[Validate('required|string|max:150', "Sujet")]
    public $subject;
    #[Validate('required|string|max:600', "Message")]
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
