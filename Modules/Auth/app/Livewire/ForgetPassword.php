<?php

namespace Modules\Auth\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Modules\User\app\Models\User;


class ForgetPassword extends Component
{
    public $email;

    public function resetPassword(): void
    {
        $user = User::query()->where('email', $this->email)->first();

        if($user){
            $result = Password::sendResetLink(['email' => $this->email]);
            if($result===Password::RESET_LINK_SENT){
                session()->flash('message','ایمیل بازآوری رمز عبور ارسال شد');
            }else{
                session()->flash('message','مشکل در ارسال ایمیل رمز عبور');
            }
        }else{
            session()->flash('message','ایمیلی با این آدرس وجود ندارد');
        }
    }
    #[Layout('auth::components.layouts.app') , Title('فراموشی رمز عبور')]
    public function render(): view
    {
        return view('auth::livewire.forget-password');
    }
}
