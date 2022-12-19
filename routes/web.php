<?php

// use <- to load your controllers
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\POS\SupplierController;
use App\Http\Controllers\POS\CustomerController;
use App\Http\Controllers\POS\UnitsController;
use App\Http\Controllers\POS\CategoriesController;
use App\Http\Controllers\POS\ProductsController;
use App\Http\Controllers\POS\PurchasesController;
use App\Http\Controllers\POS\StocksController;
use App\Http\Controllers\POS\UsersController;
use Illuminate\Support\Auth;



Route::get('/', function () {
    return view('welcome');
});

// handles error 404 incorrect url
Route::fallback(function (){
   return view('admin.index');
});
// end of handles error 404 incorrect url


Route::controller(DemoController::class)->group(function () {
    Route::get('/about', 'Index')->name('about.page')->middleware('check');
    Route::get('/contact', 'ContactMethod')->name('cotact.page');    
});


 // Admin All Route 
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'Profile')->name('admin.profile');
    Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
    Route::post('/store/profile', 'StoreProfile')->name('store.profile');

    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/update/password', 'UpdatePassword')->name('update.password');
     
});

// Users All Route 

Route::controller(UsersController::class)->group(function(){
   Route::get('/users/all', 'UsersAll')->name('users.all');
   Route::get('/user/add','UserAdd')->name('user.add');
   Route::post('/user/store', 'UserStore')->name('user.store');
   Route::get('/user/delete/{id}', 'UserDelete')->name('user.delete');
   Route::get('/user/edit/{id}', 'UserEdit')->name('user.edit');
   Route::post('/user/update', 'UserUpdate')->name('user.update');
});

 // Supplier All Route 
 Route::controller(SupplierController::class)->group(function () { // must create a controller and model for this route
    Route::get('/supplier/all', 'SupplierAll')->name('supplier.all'); // name() to use when generating URL  or redirects via laravel's route.  
    Route::get('/supplier/add','SupplierAdd')->name('supplier.add');
    Route::post('/supplier/store', 'SupplierStore')->name('supplier.store');     
    Route::get('/supplier/edit/{id}','SupplierEdit')->name('supplier.edit'); 
    Route::post('/supplier/update','SupplierUpdate')->name('supplier.update');
    Route::get('/supplier/delete/{id}','SupplierDelete')->name('supplier.delete');
}); //get('URL', 'function name') parameters

// Customer All Route 
 Route::controller(CustomerController::class)->group(function(){
    Route::get('/customer/all','CustomersAll')->name('customers.all');
    Route::get('/customer/add','CustomersAdd')->name('customer.add');
    Route::post('/customer/store','CustomerStore')->name('customer.store');
    Route::get('/customer/delete/{id}','CustomerDelete')->name('customer.delete');
    Route::get('/customer/edit/{id}', 'CustomerEdit')->name('customer.edit');
    Route::post('/customer/update', 'CustomerUpdate')->name('customer.update');
 });

 // Units All Route 
 Route::controller(UnitsController::class)->group(function(){
    Route::get('/units/all','UnitsAll')->name('units.all');
    Route::get('/unit/add', 'UnitAdd')->name('unit.add');
    Route::post('/unit/store', 'UnitStore')->name('unit.store');
    Route::get('/unit/edit/{id}', 'UnitEdit')->name('unit.edit');
    Route::post('/unit/edit', 'UnitUpdate')->name('unit.update');
    Route::get('/unit/delete/{id}', 'UnitDelete')->name('unit.delete');

 });

 // Categories All Route 
 Route::controller(CategoriesController::class)->group(function(){
    Route::get('/categories/all', 'CategoriesAll')->name('categories.all');
    Route::get('/categories/add', 'CategoryAdd')->name('category.add');
    Route::post('/categories/store', 'CategoryStore')->name('category.store');
    Route::get('/categories/edit/{id}', 'CategoryEdit')->name('category.edit');
    Route::post('/categories/update', 'CategoryUpdate')->name('category.update');
    Route::get('/categories/delete/{id}', 'CategoryDelete')->name('category.delete');
 });

 // Products All Route 
 Route::controller(ProductsController::class)->group(function(){
    Route::get('/products/all', 'ProductsAll')->name('products.all');
    Route::get('/products/add', 'ProductAdd')->name('product.add');
    Route::post('/products/store', 'ProductStore')->name('product.store');
    Route::get('/products/edit/{id}', 'ProductEdit')->name('product.edit');
    Route::post('/products/update', 'ProductUpdate')->name('product.update');
    Route::get('/products/delete/{id}', 'ProductDelete')->name('product.delete');
 });

 Route::controller(PurchasesController::class)->group(function(){
    Route::get('/purchases/all', 'PurchasesAll')->name('purchases.all');
    Route::get('/purchase/add', 'PurchaseAdd')->name('purchase.add');
 });

 Route::controller(StocksController::class)->group(function(){
   Route::get('/stocks/all','StocksAll')->name('stocks.all');
});
Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('dashboard'); // middleware is used to authenticate user and redirect to a specific location in app.

require __DIR__.'/auth.php';


// Route::get('/contact', function () {
//     return view('contact');
// });
