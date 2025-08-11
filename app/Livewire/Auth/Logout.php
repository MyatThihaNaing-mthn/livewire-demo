<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class Logout extends Component
{

    public function mount()
    {
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('login')->with('message', 'You have been logged out successfully.');
    }
    public function render()
    {
        return view('livewire.auth.logout');
    }
}
