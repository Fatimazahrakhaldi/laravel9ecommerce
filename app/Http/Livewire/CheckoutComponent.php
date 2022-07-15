<?php

namespace App\Http\Livewire;

use Cart;
use Exception;
use CMI\CmiClient;
use App\Models\Order;
use Livewire\Component;
use App\Models\Shipping;
use App\Models\OrderItem;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\ProcessController;

class CheckoutComponent extends Component
{
    public $ship_to_different;

    public $firstname;
    public $lastname;
    public $mobile;
    public $email;
    public $line1;
    public $line2;
    public $city;
    public $country;
    public $zipcode;

    public $s_firstname;
    public $s_lastname;
    public $s_mobile;
    public $s_email;
    public $s_line1;
    public $s_line2;
    public $s_city;
    public $s_country;
    public $s_zipcode;

    public $paymentmode;
    public $thankyou;

    public function mount()
    {
        $this->firstname = "fatima";
        $this->lastname = "z";
        $this->mobile = "06444444444";
        $this->email = "test@mail.com";
        $this->line1 = "adress test";
        $this->city = "rabat";
        $this->country = "maroc";
        $this->zipcode = "11000";
        $this->paymentmode = "card";
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'firstname' => 'required',
            'lastname' => 'required',
            'mobile' => 'required|numeric',
            'email' => 'required|email',
            'line1' => 'required',
            'city' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
            'paymentmode' => 'required',
        ]);

        if ($this->ship_to_different) {
            $this->validateOnly($fields, [
                's_firstname' => 'required',
                's_lastname' => 'required',
                's_mobile' => 'required|numeric',
                's_email' => 'required|email',
                's_line1' => 'required',
                's_city' => 'required',
                's_country' => 'required',
                's_zipcode' => 'required',
            ]);
        }

        // if($this->paymentmode == "card"){
        //     // $this->validateOnly($fields, [
        //     //     'firstname' => 'required',
        //     // ]);
        // }
    }

    public function placeOrder()
    {
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'mobile' => 'required|numeric',
            'email' => 'required|email',
            'line1' => 'required',
            'city' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
            'paymentmode' => 'required',
        ]);

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->discount = session()->get('checkout')['discount'];
        $order->tax = session()->get('checkout')['tax'];
        $order->total = session()->get('checkout')['total'];
        $order->firstname = $this->firstname;
        $order->lastname = $this->lastname;
        $order->mobile = $this->mobile;
        $order->email = $this->email;
        $order->line1 = $this->line1;
        $order->line2 = $this->line2;
        $order->city = $this->city;
        $order->country = $this->country;
        $order->zipcode = $this->zipcode;
        $order->status = 'ordered';
        $order->is_shipping_different = $this->ship_to_different ? 1 : 0;
        $order->save();

        foreach (Cart::instance('cart')->content() as $item) {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }

        if ($this->ship_to_different) {
            $this->validate([
                's_firstname' => 'required',
                's_lastname' => 'required',
                's_mobile' => 'required|numeric',
                's_email' => 'required|email',
                's_line1' => 'required',
                's_city' => 'required',
                's_country' => 'required',
                's_zipcode' => 'required',
            ]);

            $shipping = new Shipping();
            $shipping->order_id = $order->id;
            $shipping->firstname = $this->s_firstname;
            $shipping->lastname = $this->s_lastname;
            $shipping->mobile = $this->s_mobile;
            $shipping->email = $this->s_email;
            $shipping->line1 = $this->s_line1;
            $shipping->line2 = $this->s_line2;
            $shipping->city = $this->s_city;
            $shipping->country = $this->s_country;
            $shipping->zipcode = $this->s_zipcode;
            $shipping->save();
        }

        if ($this->paymentmode == 'cod') {

            $this->makeTransaction($order->id, 'pending');
            $this->resetCart();

        } else if ($this->paymentmode == 'card') {

            try {
                $client = new CmiClient(
                    $client = [
                        'storekey' => env('CMI_STORE_KEY'), // STOREKEY
                        'clientid' => env('CMI_CLIENT_ID'), // CLIENTID
                        // 'oid' => date('dmY') . rand(10, 1000), // COMMAND ID IT MUST BE UNIQUE
                        // 'oid' => (string)$order->id, // COMMAND ID IT MUST BE UNIQUE
                        // Dans Cmi, vous devez fournir un identifiant de la commande, sauf que dans la plupart des cas la commande est créée après le paiement de l'utilisateur
                        // donc à la place, vous pouvez utiliser soit un identifant de transaction ou l'identifiant du panier et ajouter 3 nombres aléatoires, et récupérer le panier actuel dans le callback en supprimant les 3 derniers chiffres.
                        // La valeur de oid doit être unique pour chaque transaction. Parce que si l'utilisateur clique sur revenir en arrière sans payer. Vous ne pouvez pas utiliser le même identifiant de transaction (Allez comprendre)
                        'oid' => $order->id . rand(100, 900),
                        'shopurl' => env('CMI_SHOP_URL'), // SHOP URL FOR REDIRECTION
                        'okUrl' => env('CMI_OK_URL'), // REDIRECTION AFTER SUCCEFFUL PAYMENT
                        'failUrl' => env('CMI_FAIL_URL'), // REDIRECTION AFTER FAILED PAYMENT
                        'email' =>  $order->email, // YOUR EMAIL APPEAR IN CMI PLATEFORM
                        'BillToName' => $order->firstname . ' ' . $order->lastname, // YOUR NAME APPEAR IN CMI PLATEFORM
                        'BillToCompany' => 'H&F', // YOUR COMPANY NAME APPEAR IN CMI PLATEFORM
                        'BillToStreet12' => $order->line1, // YOUR ADDRESS APPEAR IN CMI PLATEFORM NOT REQUIRED
                        'BillToCity' => $order->city, // YOUR CITY APPEAR IN CMI PLATEFORM NOT REQUIRED
                        'BillToStateProv' => '', // YOUR STATE APPEAR IN CMI PLATEFORM NOT REQUIRED
                        'BillToPostalCode' => $order->zipcode, // YOUR POSTAL CODE APPEAR IN CMI PLATEFORM NOT REQUIRED
                        'BillToCountry' => '504', // YOUR COUNTRY APPEAR IN CMI PLATEFORM NOT REQUIRED (504=MA)
                        'tel' => $order->mobile, // YOUR PHONE APPEAR IN CMI PLATEFORM NOT REQUIRED
                        'amount' => session()->get('checkout')['total'], // RETRIEVE AMOUNT WITH METHOD POST
                        'CallbackURL' => env('CMI_CALLBACK_URL'), // CALLBACK
                        // 'AutoRedirect' => 'true'
                    ]
                );

                session()->put('client', $client);
                session()->save();
                // redirect to cmi
                return redirect()->action(
                    [ProcessController::class, "index"]
                );
            // if($status == 1){
            //     $this->makeTransaction($order->id,'approved');
            // }else{
            //     session()->flash('error_payment_cmi','');
            //     $this->thankyou = 0;
            // }
            } catch (Exception $e) {
            //     session()->flash('cmi_error',$e->getMessage());
            //                     $this->thankyou = 0;
            }

        }
    }
    public function okUrlCmi(Request $request)
    {
        //Look, in the orders’ DB for the record identified by the value of the "oid" parameter sent by the CMI platform in the request. And trait your order as you want.
        dd($request->all());
    }

    public function callback(Request $request)
    {
        dd($request->all());
    }

    public function failUrl(Request $request)
    {
        dd($request->all());
    }

    public function resetCart()
    {
        $this->thankyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }

    public function makeTransaction($order_id, $status)
    {
        $transaction = new Transaction();
        $transaction->user_id =  Auth::user()->id;
        $transaction->order_id =  $order_id;
        $transaction->mode =  $this->paymentmode;
        $transaction->status =  $status;
        $transaction->save();
    }

    public function verifyForCheckout()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        } else if ($this->thankyou) {
            return redirect()->route('thankyou');
        } else if (!session()->get('checkout')) {
            return redirect()->route('product.cart');
        }
    }

    public function render()
    {
        $this->verifyForCheckout();
        session()->flash('message', 'ddd');

        return view('livewire.checkout-component')->layout('layouts.front.base');
    }
}
