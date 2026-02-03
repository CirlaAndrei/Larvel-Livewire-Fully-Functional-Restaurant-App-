<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserAvatar extends Component
{
    protected $listeners = ['saved' => '$refresh'];

    public function render()
    {
        return view('livewire.user-avatar', [
            'user' => auth()->user()->fresh(),
        ]);
    }
}