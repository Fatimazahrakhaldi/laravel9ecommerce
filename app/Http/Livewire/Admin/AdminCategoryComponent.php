<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $deleteId = '';

    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function deleteCategory()
    {
        Category::find($this->deleteId)->delete();
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('message','Category has been Deleted successfuly.');
    }

    public function render()
    {
        $categories = Category::paginate(10);
        return view('livewire.admin.admin-category-component',['categories' => $categories])->layout('layouts.admin.base');
    }
}
