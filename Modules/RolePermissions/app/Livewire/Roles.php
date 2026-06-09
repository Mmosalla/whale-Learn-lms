<?php

namespace Modules\RolePermissions\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    use WithPagination;

    public $editIndex = null;
    #[Validate('required|unique:roles,name')]
    public $name;
    protected $paginationTheme = 'bootstrap';


    #[Computed]
    public function roles()
    {
        return Role::query()
            ->paginate(6);

    }


    public function createRow(): void
    {

        $this->validate();
        Role::query()->create([
            'name' => $this->name,
        ]);
        $this->reset('name');
        $this->dispatch('create_row');
    }

    public function editRow($id): void
    {
        $this->editIndex = $id;
        $role = Role::query()->findOrFail($id);
        $this->name = $role->name;
    }

    public function updateRow(): void
    {
        $this->validate();
       Role::query()
            ->find($this->editIndex)
            ->update([
                'name' => $this->name,

            ]);
        $this->reset('title', 'parent_id');
        $this->dispatch('update_row');
        $this->editIndex = null;
    }

    #[On('destroy_row')]
    public function destroy_row($id): void
    {
        Role::destroy($id);
        $this->editIndex = null;
    }

    #[Layout('panel::components.layouts.app'), Title('نقش ها')]
    public function render(): view
    {
        return view('rolepermissions::livewire.roles');
    }
}

// Mohsen was here mmosalla36@gmail.com😎
