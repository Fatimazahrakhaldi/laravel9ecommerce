<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminEditCategoryComponent extends Component
{
    public $category_slug;
    public $category_id;
    public $name;
    public $slug;

    public function mount($category_slug)
    {
        $this->category_slug = $category_slug;
        $category = Category::where('slug', $category_slug)->first();
        $this->category_id = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;
    }

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => ['required',Rule::unique('categories')->ignore($this->slug,'slug')]
        ]);
    }

    public function updateCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => ['required',Rule::unique('categories')->ignore($this->slug,'slug')]
        ]);

        $category = Category::find($this->category_id);
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        $this->dispatchBrowserEvent('contentChanged');
        session()->flash('message','Category has been updated successfuly.');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-category-component')->layout('layouts.admin.base');
    }
}
