<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Validate("required|string|email")]
    public $email = '';
    #[Validate("required|string")]
    public $password = '';
    #[Validate("bool")]
    public $remember = false;

    public function login()
    {
        $this->validate();
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            return redirect()->route('home');
        } else {
            Session::flash('error', 'Invalid credentials');
        }
    }
    public function render()
    {
        return view('livewire.auth.login');
    }
}
