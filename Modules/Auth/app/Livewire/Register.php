<?php

namespace Modules\Auth\Livewire;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Register extends Component
{

    public $name ;
    public $email ;
    public $password ;
    public $password_confirmation ;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed',
        'password_confirmation' => 'required',
    ] ;

    public function RegisterUser(): void
    {
        $this->validate();

        $user = User::query()->create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        Auth::login($user);


    }
    #[Layout('auth::components.layouts.app')]
    public function render(): view
    {
        return view('auth::livewire.register');
    }
}
