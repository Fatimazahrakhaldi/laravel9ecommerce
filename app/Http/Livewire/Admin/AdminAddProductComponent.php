<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $sku;
    public $stock_status;
    public $quantity;
    public $featured;
    public $image;
    public $category_id;
    public $images;

    public function mount()
    {
        $this->stock_status = 'instock';
        $this->featured = 0;
    }

    public function generateslug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required|unique:products',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'sku' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'image' => 'required|mimes:webp,jpeg,jpg,png',
            'category_id' => 'required'
        ]);
    }

    public function addProduct()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:products',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'sku' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'image' => 'required|mimes:webp,jpeg,jpg,png',
            'category_id' => 'required'
        ]);

        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->sku = $this->sku;
        $product->stock_status = $this->stock_status;
        $product->quantity = $this->quantity;
        $product->featured = $this->featured;
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('products', $imageName);
        $product->image = $imageName;

        if($this->images)
        {
            $imagesname="";
            foreach ($this->images as $key => $image) {
                $imageName = Carbon::now()->timestamp . $key . '.'. $image->extension();
                $image->storeAs('products', $imageName);
                $imagesname = $imagesname .','. $imageName;
            }
            $product->images = $imagesname;
        }

        $product->category_id = $this->category_id;
        $product->save();
        $this->dispatchBrowserEvent('contentChanged');
        session()->flash('message', 'Product has been created successfuly.');
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-add-product-component', ['categories' => $categories])->layout('layouts.admin.base');
    }
}
