<?php

namespace Modules\Auth\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ForgetPassword extends Component
{
    #[Layout('auth::components.layouts.app')]
    public function render(): view
    {
        return view('auth::livewire.forget-password');
    }
}
