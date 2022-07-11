<?php

namespace App\Http\Livewire;

use App\Models\Sale;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\HomeSlider;
use App\Models\HomeCategory;
use App\Http\Livewire\HomeComponent;

class HomeComponent extends Component
{
    public $getProductsByIdCat = '\App\Http\Livewire\HomeComponent::getProductsByIdCatInternal';

    static function getProductsByIdCatInternal($category_id,$no_of_products)
    {
        $products = Product::where('category_id',$category_id)->get()->take($no_of_products);
        return $products;
    }

    public function render()
    {
        $sliders = HomeSlider::where('status', 1)->get();
        $lproducts = Product::orderby('created_at', 'DESC')->get()->take(8);
        $category = HomeCategory::find(1);
        $cats = explode(',', $category->sel_categories);
        $categories = Category::whereIn('id', $cats)->get();
        $no_of_products = $category->no_of_categories;
        $sproducts = Product::where('sale_price','>',0)->inRandomOrder()->get()->take(8);
        $sale = Sale::find(1);
        return view('livewire.home-component', ['sliders' => $sliders, 'lproducts' => $lproducts, 'categories' => $categories, 'no_of_products' => $no_of_products,'sproducts'=>$sproducts,'sale'=>$sale])->layout('layouts.front.base');
    }
}
