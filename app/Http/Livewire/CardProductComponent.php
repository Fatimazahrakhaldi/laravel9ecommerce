<?php

namespace App\Http\Livewire;

use Cart;
use App\Models\Sale;
use Livewire\Component;
use Livewire\WithPagination;

class CardProductComponent extends Component
{
    public $product;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added in cart');
        return redirect()->route('product.cart');
    }

    public function addToWishlist($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component', 'refreshComponent');
    }

    public function removeFromWishlist($product_id)
    {
        foreach (Cart::instance('wishlist')->content() as $witems) {
            if ($witems->id == $product_id) {
                Cart::instance('wishlist')->remove($witems->rowId);
                $this->emitTo('wishlist-count-component', 'refreshComponent');
                return;
            }
        }
    }

    public function render()
    {
        $witems = Cart::instance('wishlist')
            ->content()
            ->pluck('id');
        $sale = Sale::find(1);

        return view('livewire.card-product-component', ['product' => $this->product, 'witems' => $witems, 'sale' => $sale])->layout('layouts.front.base');
    }
}
