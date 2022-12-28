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
use App\Http\Controllers\POS\SupplierDeliveriesController;
use App\Http\Controllers\POS\AppliancesDeliveriesController;
use App\Http\Controllers\POS\BrandsController;
use App\Http\Controllers\POS\ProductsCapController;  
use App\Http\Controllers\POS\FurnituresDeliveriesController;
use App\Http\Controllers\POS\FurnituresController;  
use App\Http\Controllers\POS\AppliancesSalesController;
use App\Http\Controllers\POS\TestCategoryController;
use App\Http\Controllers\POS\AppliancesCategoriesController; 
use App\Http\Controllers\POS\AppliancesProductsController;              
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

 //Products Cap all Route
 Route::controller(ProductsCapController::class)->group(function(){
   Route::get('/caparal/products/all', 'ProductsCapAll')->name('productsCap.all');
   Route::get('/caparal/products/add', 'ProductsCapAdd')->name('productCap.add');
   Route::post('/caparal/products/store', 'ProductCapStore')->name('productCap.store');
   Route::get('/caparal/products/edit/{id}', 'ProductCapEdit')->name('productCap.edit');
   Route::post('/caparal/products/update', 'ProductCapUpdate')->name('productCap.update');
   Route::get('/caparal/products/delete/{id}', 'ProductCapDelete')->name('productCap.delete');
 });

 Route::controller(PurchasesController::class)->group(function(){
    Route::get('/purchases/all', 'PurchasesAll')->name('purchases.all');
    Route::get('/purchase/add', 'PurchaseAdd')->name('purchase.add');
    Route::post('/purchase/store', 'PurchaseStore')->name('purchase.store');
    Route::get('/purchase/delete/{id}', 'PurchaseDelete')->name('purchase.delete');
    Route::get('/purchase/pending', 'PurchasePending')->name('purchases.pending');
    Route::get('/purchase/approve/{id}', 'PurchaseApprove')->name('purchase.approve');
 });

//StocksController
 Route::controller(StocksController::class)->group(function(){
   Route::get('/stocks/all','StocksAll')->name('stocks.all');
   Route::get('/stocks/appliances', 'AppliancesAll')->name('appliances.all');
});//end controller

//appliances deliveries controller
 Route::controller(AppliancesDeliveriesController::class)->group(function(){
   Route::get('/appliances/deliveries/all', 'AppliancesDeliveriesAll')->name('appliancesDeliveries.all');
   Route::get('/appliances/deliveries/add', 'AppliancesDeliveriesAdd')->name('appliancesDeliveries.add');
   Route::post('/appliances/deliveries/store', 'AppliancesDeliveriesStore')->name('appliancesDeliveries.store');
   Route::get('/appliances/deliveries/delete/{id}', 'AppliancesDeliveriesDelete')->name('appliancesDeliveries.delete');
 });

 // appliancesProducts controller
 Route::controller(AppliancesProductsController::class)->group(function(){
   Route::get('/appliances/products/all', 'AppliancesProductsAll')->name('appliancesProducts.all');
   Route::get('/appliances/products/add', 'AppliancesProductsAdd')->name('appliancesProducts.add');
   Route::post('/appliances/products/store', 'AppliancesProductStore')->name('appliancesProduct.store');
   Route::get('/appliances/products/delete/{id}', 'AppliancesProductDelete')->name('appliancesProduct.delete');
   Route::get('/appliances/products/edit/{id}', 'AppliancesProductEdit')->name('appliancesProduct.edit');
 });

 // Brands Controller
 Route::controller(BrandsController::class)->group(function(){
   Route::get('/brands/all', 'BrandsAll')->name('brands.all');
   Route::get('/brands/add', 'BrandAdd')->name('brand.add');
   Route::post('brand/store', 'BrandStore')->name('brand.store');
   Route::get('/brand/edit/{id}', 'BrandEdit')->name('brand.edit');
   Route::post('brand/update', 'BrandUpdate')->name('brand.update');
 });

 Route::controller(AppliancesCategoriesController::class)->group(function(){
   Route::get('/appliances/categories/all', 'AppliancesCategoriesAll')->name('appliancesCategories.all');
   Route::get('/appliances/categories/add', 'AppliancesCategoriesAdd')->name('appliancesCategories.add');
   Route::post('appliances/categories/store', 'AppliancesCategoriesStore')->name('appliancesCategory.store');
   Route::get('/appliances/categories/delete/{id}', 'AppliancesCategoriesDelete')->name('appliancesCategory.delete');
   Route::get('/appliances/categories/edit/{id}', 'AppliancesCategoriesEdit')->name('appliancesCategory.edit');   
   Route::post('appliances/categories/update', 'AppliancesCategoriesUpdate')->name('appliancesCategory.update');
 });

//Supplier Deliveries Controller
Route::controller(SupplierDeliveriesController::class)->group(function(){
   Route::get('/supplierDeliveries/all', 'SupplierDeliveriesAll')->name('supplierDeliveries.all');
});

// furniture deliveries controller
Route::controller(FurnituresDeliveriesController::class)->group(function(){
   Route::get('/furnitures/deliveries/all', 'FurnitureDeliveriesAll')->name('furnitureDeliveries.all');
   Route::get('/furnitures/deliveries/add', 'FurnitureDeliveriesAdd')->name('furnitureDeliveries.add');

});

// furnitures controller
Route::controller(FurnituresController::class)->group(function(){
   Route::get('/furnitures/all', 'FurnituresAll')->name('furnitures.all');
});

//appliances sales controller
Route::controller(AppliancesSalesController::class)->group(function(){
   Route::get('/appliances/sales/all', 'AppliancesSalesAll')->name('appliancesSales.all');
   Route::get('/appliances/sales/add', 'AppliancesSalesAdd')->name('appliancesSales.add');
});//end of function

//test category controller
Route::controller(TestCategoryController::class)->group(function(){
   Route::get('/test/category/all', 'TestCategoryAll')->name('testCategory.all');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('dashboard'); // middleware is used to authenticate user and redirect to a specific location in app.

require __DIR__.'/auth.php';


// Route::get('/contact', function () {
//     return view('contact');
// });
