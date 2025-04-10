<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{

    #[Validate(['email' => 'required|email'])]
    public string $email = '';
    #[Validate(['password' => 'required|min:6'])]
    public string $password = '';

    public function login(){
        $this->validate();
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate();
            return redirect()->route('dashboard');
        } else {
            session()->flash('error', 'Credenciais inválidas.');
        }
    }
    public function render()
    {
        return view('livewire.login')
            ->layout('components.layouts.guest');
    }
}
