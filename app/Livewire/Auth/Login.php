<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Login extends Component
{
    public $email;
    public $password;
    public $currentUser;

    public function mount()
    {
        $this->email = '';
        $this->password = '';

        $currentUser = Auth::user();
        if ($currentUser) {
            return redirect()->route('home')->with('message', 'You are already logged in.');
        }
    }

    public function login()
    {
        $validated = $this->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if(Auth::attempt($validated)) {
            request()->session()->regenerate();
            session()->flash('message', 'Login successful.');
            return redirect()->route('home');
        }
        
        $this->reset(['password']);
        $this->addError('email', 'The provided credentials do not match our records.');

    }
    public function render()
    {
        return view('livewire.auth.login');
    }
}
