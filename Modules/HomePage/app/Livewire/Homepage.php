<?php

namespace Modules\HomePage\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Homepage extends Component
{
    #[Layout('homepage::components.layouts.app')]
    public function render(): view
    {
        return view('homepage::livewire.homepage');
    }
}

// Mohsen was here mmosal36@gmail.com 😎
