<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;

class MyForm extends Component
{
    #[Rule("required|min:2|max:50")]
    public $name;
    #[Rule("required|email|unique:users")]
    public $email;
    #[Rule("required|min:5")]
    public $password;
    public function createNewUser(){
        $this -> validate();

        // if you will not use #[Rule()]
        // you can use
        // $this -> validate([
        //     "name"=> "required|min:2|max:50",
        //     "email"=> "required|email|unique:users",
        //     "password"=> "required|min:5",
        // ]);

        User::create([
            "name"=> $this->name,
            "email"=> $this->email,
            "password"=> bcrypt($this->password),
        ]);

        $this -> reset();
        // $this -> reset(["password"]); // if you want to reset password only
    }

    public function render()
    {
        $users = User::all();
        return view('livewire.my-form', ['users'=> $users]);
    }
}
