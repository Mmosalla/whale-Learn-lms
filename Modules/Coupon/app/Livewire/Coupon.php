<?php

namespace Modules\Coupon\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Coupon extends Component
{
    #[Layout('panel::components.layouts.app'), Title('کد های تخفیف')]
    public function render():view
    {
        return view('coupon::livewire.coupon');
    }
}
//Mohsen was here mmosalla36@gmail.com 😎
