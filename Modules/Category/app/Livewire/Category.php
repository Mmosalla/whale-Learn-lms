<?php

namespace Modules\Category\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Category extends Component
{
    use WithPagination;

    public $title;
    public $parent_id = 0;
    public $parentCategories;

    protected $paginationTheme = 'bootstrap';

    public function mount(): void
    {
        $this->parentCategories = \Modules\Category\app\Models\Category::query()
            ->where('parent_id', 0)
            ->pluck('title', 'id')
            ->toArray();
    }

    #[Computed]
    public function categories()
    {
        return \Modules\Category\app\Models\Category::query()->paginate(1);

    }

    protected function rules(): array
    {
        return [
            'title' => 'required',
            'parent_id' => 'nullable',

        ];
    }

    public function createCategory()
    {

        $this->validate();
        \Modules\Category\app\Models\Category::query()->create([
            'title' => $this->title,
            'slug' => make_slug($this->title),
            'parent_id' => $this->parent_id,
        ]);
        $this->reset('title , parent_id');




    }

    #[Layout('panel::components.layouts.app'), Title('دسته بندی ها')]
    public function render(): view
    {
        return view('category::livewire.category');
    }
}
