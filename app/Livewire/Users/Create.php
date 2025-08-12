<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;

class Create extends Component
{
    #[Validate]
    public $username = "";
    #[Validate]
    public $email = "";
    #[Validate]
    public $password = "";
    #[Validate]
    public $confirmation_password = "";
    #[Validate]
    public $roleId = "";

    public $roles;

    public function mount()
    {
        // Initialize roles
        $this->roles = Role::all();
    }

    protected function rules()
    {
        return [
            'username' => 'required|string|max:30|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:3',
            'confirmation_password' => 'required_with:password|same:password',
            'roleId' => 'required|exists:roles,id',
        ];
    }


    public function save(){


        $validated = $this->validate();

        //$this->dispatch('log-message', ['username' => $this->username, 'email' => $this->email, 'roleId' => $this->roleId]);

        if (!$validated) {
            return;
        }

        User::create(
            [
                'name' => $this->username,
                'email' => $this->email,
                'password' => bcrypt($this->password),
                'role_id' => $this->roleId, 
            ]
            );

        

        session()->flash('message', 'User created successfully.');
        $this->reset(['username', 'email', 'password', 'roleId']);
        return $this->redirect('/');
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }


    public function render()
    {
        return view('livewire.users.create', [
            'roles' => $this->roles,
        ]);
    }
}
