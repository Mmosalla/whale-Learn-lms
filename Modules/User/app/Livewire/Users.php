<?php

namespace Modules\User\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\User\app\Models\User;
use Spatie\Permission\Models\Role;

class Users extends Component
{
    use WithPagination;

    public $user_roles = [] ;
    public $selected_user;
    protected $paginationTheme = 'bootstrap';

    public function selectUser($user_id): void
    {
        $this->selected_user = User::query()->findOrFail($user_id);
        foreach ($this->selected_user->getRoleNames() as $role) {
            $this->user_roles[] = $role;
        }
    }

    public function createUserRoles(): void
    {
        $this->selected_user->syncRoles($this->user_roles);
        $this->dispatch('assign.role');
        $this->reset(['selected_user']);
    }

    #[Layout('panel::components.layouts.app') , Title('کاربران')]
    public function render(): view
    {
        $users = User::query()->paginate(10);
        $roles = Role::query()->pluck('name');
        return view('user::livewire.users' , compact('users','roles'));
    }
}
