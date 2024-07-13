<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class MyForm extends Component
{
    use WithPagination;
    use WithFileUploads;
    #[Rule("required|min:2|max:50")]
    public $name;
    #[Rule("required|email|unique:users")]
    public $email;
    #[Rule("required|min:5")]
    public $password;
    #[Validate("nullable|sometimes|image|max:2046")]
    public $image;
    public function createNewUser()
    {
        $this->validate();

        // if you will not use #[Rule()]
        // you can use
        // $this -> validate([
        //     "name"=> "required|min:2|max:50",
        //     "email"=> "required|email|unique:users",
        //     "password"=> "required|min:5",
        // ]);

        User::create([
            "name" => $this->name,
            "email" => $this->email,
            "password" => bcrypt($this->password),
            "image" => $this->image->store("uploaded/profile", "public")
        ]);

        $this->reset();
        // $this -> reset(["password"]); // if you want to reset password only
    }

    public function render()
    {
        $users = User::paginate(3);
        return view('livewire.my-form', ['users' => $users]);
    }
}
