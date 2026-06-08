<?php

namespace Modules\Panel\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component

{
    #[Layout('panel::components.layouts.app') , Title('داشبورد')]
    public function render(): view
    {
        return view('panel::livewire.dashboard');
    }
}
