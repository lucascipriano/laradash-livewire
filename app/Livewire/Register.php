<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Register extends Component
{
    #[Validate(['name' => 'required|min:3'])]
    public string $name;
    #[Validate(['email' => 'required|email'])]
    public string $email;
    #[Validate(['password' => 'required|min:6'])]
    public string $password;
    #[Validate(['password_confirmation' => 'required|same:password'])]
    public string $password_confirmation;


    public function register()
    {
        $this->validate();
        // Check if the email already exists
        if (User::where('email', $this->email)->exists()) {
            session()->flash('error', 'Este e-mail já está cadastrado.');
            return;
        }

         $user = User::create([
             'name' => $this->name,
             'email' => $this->email,
             'password' => bcrypt($this->password),
         ]);


        if ($user) {
            // Automatically log in the user after registration
            auth()->login($user);
            session()->flash('success', 'Usuário cadastrado com sucesso.');
            return redirect()->route('dashboard');
        }
    }

    public function render()
    {
        return view('livewire.register')
            ->layout('components.layouts.guest');
    }
}
