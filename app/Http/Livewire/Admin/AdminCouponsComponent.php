<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class AdminCouponsComponent extends Component
{
    // use WithPagination;
    // protected $paginationTheme = 'bootstrap';
    public $deleteId = '';

    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function deleteCoupon()
    {
        Coupon::find($this->deleteId)->delete();
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('message','Coupon has been Deleted successfuly.');
    }

    public function render()
    {
        $coupons = Coupon::all();
        return view('livewire.admin.admin-coupons-component', ['coupons' => $coupons])->layout('layouts.admin.base');
    }
}
