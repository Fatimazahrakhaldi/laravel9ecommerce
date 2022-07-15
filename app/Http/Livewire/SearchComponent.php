<?php

namespace App\Http\Livewire;

use Cart;
use App\Models\Sale;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class SearchComponent extends Component
{
    public $sorting;
    public $pagesize;

    public $search;
    public $product_cat;
    public $product_cat_id;

    public $min_price;
    public $max_price;

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 5;
        $this->fill(request()->only('search','product_cat','product_cat_id'));

        $this->min_price = 1;
        $this->max_price = 1000;
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name,1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in cart');
        return redirect()->route('product.cart');
    }

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        if($this->sorting == 'date'){
            $products = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->where('name','like','%'. $this->search .'%')->where('category_id','like','%'.$this->product_cat_id .'%')->orderBy('created_at','DESC')->paginate($this->pagesize);
        }else if($this->sorting == 'price'){
            $products = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->where('name','like','%'. $this->search .'%')->where('category_id','like','%'.$this->product_cat_id .'%')->orderBy('regular_price','ASC')->paginate($this->pagesize);
        }else if($this->sorting == 'price-desc'){
            $products = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->where('name','like','%'. $this->search .'%')->where('category_id','like','%'.$this->product_cat_id .'%')->orderBy('regular_price','DESC')->paginate($this->pagesize);
        }else{
            $products = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->where('name','like','%'. $this->search .'%')->where('category_id','like','%'.$this->product_cat_id .'%')->paginate($this->pagesize);
        }

        $categories = Category::all();
        $sale = Sale::find(1);
        $witems = Cart::instance('wishlist')
            ->content()
            ->pluck('id');

        return view('livewire.search-component', ['products' => $products, 'categories' => $categories, 'sale' => $sale, 'witems' => $witems])->layout('layouts.front.base');
    }
}
