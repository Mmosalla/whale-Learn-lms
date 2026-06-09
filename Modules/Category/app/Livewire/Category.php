<?php

namespace Modules\Category\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Category extends Component
{
    use WithPagination;

    public $editIndex = null;
    public $title;
    public $parent_id = 0;

    protected $paginationTheme = 'bootstrap';



    #[Computed]
    public function categories()
    {
        return \Modules\Category\app\Models\Category::query()
            ->with('parent')
            ->paginate(6);

    }

    protected function rules(): array
    {
        return [
            'title' => 'required',
            'parent_id' => 'nullable',

        ];
    }

    public function createRow(): void
    {

        $this->validate();
        \Modules\Category\app\Models\Category::query()->create([
            'title' => $this->title,
            'slug' => make_slug($this->title),
            'parent_id' => $this->parent_id,
        ]);
        $this->reset('title', 'parent_id');
        $this->dispatch('create_row');
    }

    public function editRow($id): void
    {
        $this->editIndex = $id;
        $category = \Modules\Category\app\Models\Category::query()->findOrFail($id);
        $this->parent_id = $category->parent_id;
        $this->title = $category->title;
    }

    public function updateRow(): void
    {
        $this->validate();
        \Modules\Category\app\Models\Category::query()
            ->find($this->editIndex)
            ->update([
            'title' => $this->title,
            'slug' => make_slug($this->title),
            'parent_id' => $this->parent_id,
        ]);
        $this->reset('title', 'parent_id');
        $this->dispatch('update_row');
        $this->editIndex = null;
    }

    #[On('destroy_row')]
    public function destroy_row($id): void
    {
        \Modules\Category\app\Models\Category::destroy($id);
        $this->editIndex = null;
    }

    #[Layout('panel::components.layouts.app'), Title('دسته بندی ها')]
    public function render(): view
    {
        $parentCategories=\Modules\Category\app\Models\Category::query()->with('parent')->where('parent_id',0)->pluck('title','id');
        return view('category::livewire.category' , compact('parentCategories'));
    }
}
