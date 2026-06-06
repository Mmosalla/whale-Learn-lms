<?php

namespace Modules\Auth\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Login extends Component
{
    #[Layout('auth::components.layouts.app')]
    public function render(): View
    {
        return view('auth::livewire.login');
    }
}
