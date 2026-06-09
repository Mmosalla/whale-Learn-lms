<?php

namespace Modules\Auth\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Modules\User\app\Models\User;


class Login extends Component
{
    public $email ;
    public $password ;
    public $remember;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8',
    ];

    public function LoginUser()
    {
        $this->validate();
        if (auth()->attempt(['email' => $this->email, 'password' => $this->password] , $this->remember)) {
            $user = User::query()->where('email', $this->email)->first();
            Auth::login($user);
            return redirect()->route('dashboard');
        }else{
            session()->flash('error', 'رمزعبور یا ایمیل اشباه است😑');
        }
    }

    #[Layout('auth::components.layouts.app')]
    public function render(): View
    {
        return view('auth::livewire.login');
    }
}
//Mohsen was here mmosalla36@gmail.com 😎
