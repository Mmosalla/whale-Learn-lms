<?php

namespace Modules\Cart\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Carts extends Component
{
    #[Layout('homepage::components.layouts.app') , Title('سبد خرید')]
    public function render(): view
    {
        return view('cart::livewire.carts');
    }
}

// Mohsen was here mmosalla36@gmail.com 😎
