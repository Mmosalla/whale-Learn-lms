<?php

namespace Modules\Auth\Livewire;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Modules\User\app\Models\User;

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

    public function RegisterUser()
    {
        $this->validate();

        $user = User::query()->create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        Auth::login($user);
        event(new Registered($user));
        return redirect()->route('verification.notice');

    }
    #[Layout('auth::components.layouts.app')]
    public function render(): view
    {
        return view('auth::livewire.register');
    }
}
