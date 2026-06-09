<?php

namespace Modules\Auth\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class EmailVerification extends Component
{
    public function resendEmail(): void
    {
        auth()->user()->sendEmailVerificationNotification();
        session()->flash('message','ایمیل تایید مجدد ارسال شد');
    }

    #[Layout('auth::components.layouts.app') , Title('تایید ایمیل')]
    public function render(): view
    {
        return view('auth::livewire.email-verification');
    }
}

//Mohsen was here mmosalla36@gmail.com 😎
