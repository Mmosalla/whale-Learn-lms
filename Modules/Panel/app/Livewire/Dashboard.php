<?php

namespace Modules\Panel\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Dashboard extends Component

{
    #[Layout('auth::components.layouts.app')]
    public function render(): view
    {
        return view('panel::livewire.dashboard');
    }
}
