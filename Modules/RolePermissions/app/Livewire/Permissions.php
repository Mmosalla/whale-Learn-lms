<?php

namespace Modules\RolePermissions\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class Permissions extends Component
{
    use WithPagination;

    public $editIndex = null;
    #[Validate('required|unique:permissions,name')]
    public $name;
    protected $paginationTheme = 'bootstrap';



    #[Computed]
    public function permissions(): LengthAwarePaginator
    {
        return Permission::query()
            ->paginate(6);

    }



    public function createRow(): void
    {

        $this->validate();
      Permission::query()->create([
            'name' => $this->name,
        ]);
        $this->reset('name');
        $this->dispatch('create_row');
    }

    public function editRow($id): void
    {
        $this->editIndex = $id;
        $permission = Permission::query()->findOrFail($id);
        $this->name = $permission->name;
    }

    public function updateRow(): void
    {
        $this->validate([
            'name' => 'required|unique:permissions,name,' . $this->editIndex,
        ]);
        Permission::query()
            ->find($this->editIndex)
            ->update([
                'name' => $this->name,
            ]);
        $this->reset('name');
        $this->dispatch('update_row');
        $this->editIndex = null;
    }

    #[On('destroy_row')]
    public function destroy_row($id): void
    {
       Permission::destroy($id);
        $this->editIndex = null;
    }

    #[Layout('panel::components.layouts.app'), Title('مجوز ها')]
    public function render(): view
    {
        return view('rolepermissions::livewire.permissions');
    }
}


// Mohsen was here mmosalla36@gmail.com😎
