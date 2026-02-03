<?php

// app/Livewire/NewsletterForm.php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Newsletter;

class NewsletterForm extends Component
{
    public string $mail = '';

    public function subscribe()
    {
        $this->validate([
            'mail' => 'required|email|unique:newsletters,mail',
        ]);

        Newsletter::create([
            'mail' => $this->mail,
        ]);

        return redirect()->to('/Newsletter-Validation');
    }

    public function render()
    {
        return view('livewire.newsletter-form');
    }
}