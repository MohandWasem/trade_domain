<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\Setup\ClientController;
use App\Http\Controllers\Setup\ExpenseController;
use App\Http\Controllers\Setup\ProductController;
use App\Http\Controllers\Setup\CategoryController;
use App\Http\Controllers\Setup\CurrencyController;
use App\Http\Controllers\Setup\ShipmentController;
use App\Http\Controllers\Setup\SupplierController;
use App\Http\Controllers\Setup\ShipmentProductController;
use App\Http\Controllers\Setup\ShipmentProductSalesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//   ----------------Offers---------- // 

Route::controller(OfferController::class)->middleware('AuthAdmin')->group(function(){
    Route::get('Offers','index')->name('offers');
    Route::get('Offers/show','show')->name('offers.show');
    Route::post('Offers/create','create')->name('offers.create');
    Route::post('Offers/edit/{id}','edit')->name('offers.edit');
    Route::post('Offers/update/{id}','update')->name('offers.update');
    Route::post('Offers/delete/{id}','delete')->name('offers.delete');
    Route::get('logout','logout')->name('logout');
});

//   ----------------Items---------- // 

Route::controller(ItemController::class)->middleware('AuthAdmin')->group(function(){
    Route::get('Items','index')->name('items');
    Route::get('Items/add/{offer_id}','show')->name('items.add');
    Route::post('Items/create','create')->name('items.create');
    Route::post('Items/edit/{id}','edit')->name('items.edit');
    Route::post('Items/update/{id}','update')->name('items.update');
    Route::post('Items/delete/{id}','delete')->name('items.delete');
    Route::get('create-pdf/{id}','downloadpdf')->name('pdf.create');

});

//   ----------------Clients---------- // 

Route::controller(ClientController::class)->middleware('AuthAdmin')->group(function(){
    Route::get('Clients','index')->name('clients');
    Route::get('Clients/add','add')->name('clients.add');
    Route::post('Clients/create','create')->name('clients.create');
    Route::post('Clients/edit/{id}','edit')->name('clients.edit');
    Route::post('Clients/update/{id}','update')->name('clients.update');
    Route::post('Clients/delete/{id}','delete')->name('clients.delete');
});

//   ----------------Suppliers---------- // 

Route::controller(SupplierController::class)->middleware('AuthAdmin')->group(function(){
    Route::get('Suppliers','index')->name('suppliers');
    Route::get('Suppliers/add','add')->name('suppliers.add');
    Route::post('Suppliers/create','create')->name('suppliers.create');
    Route::post('Suppliers/edit/{id}','edit')->name('suppliers.edit');
    Route::post('Suppliers/update/{id}','update')->name('suppliers.update');
    Route::post('Suppliers/delete/{id}','delete')->name('suppliers.delete');
});

//   ----------------Currencies---------- // 

Route::controller(CurrencyController::class)->middleware('AuthAdmin')->group(function(){
    Route::get('Currency','index')->name('currencies');
    Route::get('Currency/add','add')->name('currencies.add');
    Route::post('Currency/create','create')->name('currencies.create');
    Route::post('Currency/edit/{id}','edit')->name('currencies.edit');
    Route::post('Currency/update/{id}','update')->name('currencies.update');
    Route::post('Currency/delete/{id}','delete')->name('currencies.delete');
});

//   ----------------Categories---------- // 

Route::controller(CategoryController::class)->middleware('AuthAdmin')->group(function(){
    Route::get('Category','index')->name('categories');
    Route::get('Category/add','add')->name('categories.add');
    Route::post('Category/create','create')->name('categories.create');
    Route::post('Category/edit/{id}','edit')->name('categories.edit');
    Route::post('Category/update/{id}','update')->name('categories.update');
    Route::post('Category/delete/{id}','delete')->name('categories.delete');
});

//   ----------------Products---------- // 

Route::controller(ProductController::class)->middleware('AuthAdmin')->group(function(){
    Route::get('Products','index')->name('products');
    Route::get('Products/add','add')->name('products.add');
    Route::post('Products/create','create')->name('products.create');
    Route::post('Products/edit/{id}','edit')->name('products.edit');
    Route::post('Products/update{id}','update')->name('products.update');
    Route::post('Products/delete{id}','delete')->name('products.delete');
});

//   ----------------Shipments---------- // 

Route::controller(ShipmentController::class)->middleware('AuthAdmin')->group(function(){
    Route::get('Shipments','index')->name('shipments');
    Route::get('Shipments/add','add')->name('shipments.add');
    Route::post('Shipments/create','create')->name('shipments.create');
    Route::post('Shipments/edit/{id}','edit')->name('shipments.edit');
    Route::post('Shipments/update{id}','update')->name('shipments.update');
    Route::post('Shipments/delete{id}','delete')->name('shipments.delete');
    Route::get('invoice-pdf/{id}','invoicepdf')->name('pdf.invoice');
});

//   ----------------ShipmentProducts---------- // 

Route::controller(ShipmentProductController::class)->middleware('AuthAdmin')->group(function(){
    Route::get('ShipmentProducts','index')->name('ShipmentProducts');
    Route::get('ShipmentProducts/add/{shipment_id}','add')->name('ShipmentProducts.add');
    Route::post('ShipmentProducts/create','create')->name('ShipmentProducts.create');
    Route::post('ShipmentProducts/edit/{id}','edit')->name('ShipmentProducts.edit');
    Route::post('ShipmentProducts/update/{id}','update')->name('ShipmentProducts.update');
    Route::post('ShipmentProducts/delete/{id}','delete')->name('ShipmentProducts.delete');
});

//   ----------------ShipmentProductSales---------- // 

Route::controller(ShipmentProductSalesController::class)->middleware('AuthAdmin')->group(function(){
    // Route::get('ShipmentProductSale','index')->name('ShipmentProductSale');
    Route::get('ShipmentProductSales/add/{shipmentsales_id}','add')->name('ShipmentProductSale.add');
    Route::post('ShipmentProductSales/create','create')->name('ShipmentProductSale.create');
    Route::post('ShipmentProductSales/edit/{id}','edit')->name('ShipmentProductSale.edit');
    Route::post('ShipmentProductSales/update/{id}','update')->name('ShipmentProductSale.update');
    Route::post('ShipmentProductSales/delete/{id}','delete')->name('ShipmentProductSale.delete');

});

//   ----------------Expenses---------- // 

Route::controller(ExpenseController::class)->middleware('AuthAdmin')->group(function(){
    Route::get('Expenses','index')->name('Expenses');
    Route::get('Expenses/add/{shipment_id}','add')->name('Expenses.add');
    Route::post('Expenses/create','create')->name('Expenses.create');
    Route::post('Expenses/edit/{id}','edit')->name('Expenses.edit');
    Route::post('Expenses/update/{id}','update')->name('Expenses.update');
    Route::post('Expenses/delete/{id}','delete')->name('Expenses.delete');
});
