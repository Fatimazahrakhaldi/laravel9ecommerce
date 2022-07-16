<?php

namespace App\Http\Livewire;

use Cart;
use App\Models\Sale;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ShopComponent extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $sorting;
    public $pagesize;
    public $category_slug;

    public $min_price;
    public $max_price;

    public function mount($category_slug = null)
    {
        $this->sorting = "default";
        $this->pagesize = 9;

        if ( $category_slug != null) {
        $this->category_slug = $category_slug;
        } else {
            $this->category_slug = "";
        }

        $this->min_price = 1;
        $this->max_price = 1000;
    }

    public function render()
    {
        $category_ids = [];
        if ($this->category_slug != null) {
        $category = Category::where('slug', $this->category_slug)->first();
        $category_ids = (array) $category->id;
        $category_name = $category->name;
        } else {
            $category_ids = Category::pluck('id');
            $category_name = "";
        }

        switch ($this->sorting) {
            case 'date':
                $products = Product::whereIn('category_id', $category_ids)->whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy('created_at', 'DESC')->paginate($this->pagesize);
                break;
            case 'price':
                $products = Product::whereIn('category_id', $category_ids)->whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy('regular_price', 'ASC')->paginate($this->pagesize);
                break;
            case 'price-desc':
                $products = Product::whereIn('category_id', $category_ids)->whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy('regular_price', 'DESC')->paginate($this->pagesize);
                break;
            default:
                $products = Product::whereIn('category_id', $category_ids)->whereBetween('regular_price', [$this->min_price, $this->max_price])->paginate($this->pagesize);
                break;
        }

        if(Auth::check()){
            Cart::instance('cart')->store(Auth::user()->email);
        }

        $categories = Category::all();

        return view('livewire.shop-component', ['products' => $products, 'categories' => $categories, 'category_name' => $category_name])->layout('layouts.front.base');
    }
}
