<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;

// Component for listing users
class Index extends Component
{
    public $users = [];
    public $message = "test";
    public $currentUser = null;



    public function mount(){
        $this->users = User::whereHas('role', function ($query) {
            $query->where('name', Role::ROLE_USER);
        })->get();
        $this->currentUser = auth()->user();
    }
    public function render()
    {
        return view('livewire.users.index');
    }
}
