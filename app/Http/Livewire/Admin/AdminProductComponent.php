<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductComponent extends Component
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
        Product::find($this->deleteId)->delete();
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('message','Product has been deleted successfuly.');
    }

    public function render()
    {
        $products = Product::paginate(5);
        return view('livewire.admin.admin-product-component', ['products' => $products])->layout('layouts.admin.base');
    }
}
