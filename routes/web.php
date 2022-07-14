<?php

use App\Http\Controllers\ProcessController;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminHomeSliderComponent;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminAddCouponComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminCouponsComponent;
use App\Http\Livewire\Admin\AdminEditCouponComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\Admin\AdminHomeCategoryComponent;
use App\Http\Livewire\Admin\AdminSaleComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\WishlistComponent;
use GuzzleHttp\Psr7\Request;
use CMI\CmiClient;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomeComponent::class);

Route::get('/shop', ShopComponent::class)->name('shop');

Route::get('/cart', CartComponent::class)->name('product.cart');

Route::get('/checkout', CheckoutComponent::class)->name('checkout');
// Route::post('/cmi/callback', [CheckoutController::class, 'callback'])->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class); //keep in mind you can use the path you want, but you should use the callback method implemented in CmiGateway Trait
Route::post('/thank-you', ThankyouComponent::class)->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);// in CmiGateway trait this method is empty so that you can implement your process after successful payment
Route::get('/process', [ProcessController::class,"index"])->name('process');
// Route::get('/thank-you', ThankyouComponent::class)->name('thankyou');
// Route::post('/cmi/failUrl', [CheckoutController::class, 'failUrl'])->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);// the fail url will redirect user to shopUrl with an error so that user can try to pay again
// Route::get('/url-of-checkout', [CheckoutController::class, 'yourMethod']);// as an example, this is the route where the user will click pay now (We recommand to use it as shopUrl, so we can redirect user back in failure)
// Route::get('/process', function(){

//     // $client = [
//     //     'storekey' => '6u64wQ4ty78ctMs', // STOREKEY
//     //     'clientid' => '600002879', // CLIENTID
//     //     // 'oid' => date('dmY') . rand(10, 1000), // COMMAND ID IT MUST BE UNIQUE
//     //     // 'oid' => (string)$order->id, // COMMAND ID IT MUST BE UNIQUE
//     //     // Dans Cmi, vous devez fournir un identifiant de la commande, sauf que dans la plupart des cas la commande est créée après le paiement de l'utilisateur
//     //     // donc à la place, vous pouvez utiliser soit un identifant de transaction ou l'identifiant du panier et ajouter 3 nombres aléatoires, et récupérer le panier actuel dans le callback en supprimant les 3 derniers chiffres.
//     //     // La valeur de oid doit être unique pour chaque transaction. Parce que si l'utilisateur clique sur revenir en arrière sans payer. Vous ne pouvez pas utiliser le même identifiant de transaction (Allez comprendre)
//     //     'oid' => "470",
//     //     'shopurl' => env('CMI_SHOP_URL'), // SHOP URL FOR REDIRECTION
//     //     'okUrl' => env('CMI_OK_URL'), // REDIRECTION AFTER SUCCEFFUL PAYMENT
//     //     'failUrl' => env('CMI_FAIL_URL'), // REDIRECTION AFTER FAILED PAYMENT
//     //     'email' =>  "email@mail.com", // YOUR EMAIL APPEAR IN CMI PLATEFORM
//     //     'BillToName' => "vfv", // YOUR NAME APPEAR IN CMI PLATEFORM
//     //     'BillToCompany' => 'H&F', // YOUR COMPANY NAME APPEAR IN CMI PLATEFORM
//     //     'BillToStreet12' => "cdcd", // YOUR ADDRESS APPEAR IN CMI PLATEFORM NOT REQUIRED
//     //     'BillToCity' => "city", // YOUR CITY APPEAR IN CMI PLATEFORM NOT REQUIRED
//     //     'BillToStateProv' => '', // YOUR STATE APPEAR IN CMI PLATEFORM NOT REQUIRED
//     //     'BillToPostalCode' => "11000", // YOUR POSTAL CODE APPEAR IN CMI PLATEFORM NOT REQUIRED
//     //     'BillToCountry' => '504', // YOUR COUNTRY APPEAR IN CMI PLATEFORM NOT REQUIRED (504=MA)
//     //     'tel' => "083434434", // YOUR PHONE APPEAR IN CMI PLATEFORM NOT REQUIRED
//     //     'amount' => "456", // RETRIEVE AMOUNT WITH METHOD POST
//     //     'CallbackURL' => env('CMI_CALLBACK_URL'), // CALLBACK
//     //     'AutoRedirect' => 'true'
//     // ];
//     // $client = new CmiClient($client);
//     // $client->AutoRedirect = 'true'; // REDIRECT THE CUSTOMER AUTOMATICALY BACK TO THE MERCHANT's WEB SITE WHEN TRANSACION IS ACCEPTED

//     // $client->redirect_post(); // CREATE INPUTS HIDDEN, GENERATE A VALID HASH AND MAKE REDIRECT POST TO CMI
// })->name('process');

Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');

Route::get('/product-category/{category_slug}', CategoryComponent::class)->name('product.category');

Route::get('/search', SearchComponent::class)->name('produit.search');

Route::get('/wishlist', WishlistComponent::class)->name('produit.wishlist');





// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

// for User or Customer
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
});

// for Admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/categories', AdminCategoryComponent::class)->name('admin.categories');
    Route::get('/admin/category/add',AdminAddCategoryComponent::class)->name('admin.addcategory');
    Route::get('/admin/category/edit/{category_slug}',AdminEditCategoryComponent::class)->name('admin.editcategory');
    Route::get('/admin/products',AdminProductComponent::class)->name('admin.products');
    Route::get('/admin/product/add',AdminAddProductComponent::class)->name('admin.addproduct');
    Route::get('/admin/product/edit/{product_slug}',AdminEditProductComponent::class)->name('admin.editproduct');

    Route::get('/admin/slider',AdminHomeSliderComponent::class)->name('admin.homeslider');
    Route::get('/admin/slider/add',AdminAddHomeSliderComponent::class)->name('admin.addhomeslider');
    Route::get('/admin/slider/edit/{slide_id}',AdminEditHomeSliderComponent::class)->name('admin.edithomeslider');

    Route::get('/admin/home-categories',AdminHomeCategoryComponent::class)->name('admin.homecategories');
    Route::get('/admin/sale',AdminSaleComponent::class)->name('admin.sale');

    Route::get('/admin/coupons', AdminCouponsComponent::class)->name('admin.coupons');
    Route::get('/admin/coupon/add', AdminAddCouponComponent::class)->name('admin.addcoupon');
    Route::get('/admin/coupon/edit/{coupon_id}', AdminEditCouponComponent::class)->name('admin.editcoupon');
});
