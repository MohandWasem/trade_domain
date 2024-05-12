<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OfferController;

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
