<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterSubscribed;

class Newsletter extends Component
{
    public $mail;

    protected $rules = [
        'mail' => 'required|email'
    ];

    public function submit()
    {
        $this->validate();

        DB::table('tabela_newsletter_restaurant')->insert([
            'mail' => $this->mail
        ]);

        Mail::to('cirlaandrei@gmail.com')->send(
            new NewsletterSubscribed($this->mail)
        );

        return redirect('/NewsletterR-Validation');
    }

    public function render()
    {
        return view('livewire.newsletter');
    }
}