<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Website\WebsiteController;

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

Route::get('/', [WebsiteController::class, 'index']);

Route::get('about', function () {
    return view('website/about');
});
Route::get('contact', function () {
    return view('website/contact');
});
Route::post('contact', [\App\Http\Controllers\Website\WebsiteController::class, 'contact']);
Route::get('halls', function () {
    return view('website/halls');
});
Route::resource('home', \App\Http\Controllers\Website\WebsiteController::class);
Route::resource('reserve/{hall}/', \App\Http\Controllers\Website\ReserveController::class)->middleware("auth");
Route::get('search/form', 'App\Http\Controllers\HallController@search_form' )->name('search_form');
Route::post('search', 'App\Http\Controllers\HallController@searchForm' )->name('search');
//Route::get('reserve/create/{hall}', \App\Http\Controllers\Website\ReserveController::class,'create')->middleware("auth");


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'IsCheck', 'IsActive']], function () {

    Route::resource('/', \App\Http\Controllers\HallController::class);

//    Route::resource('admin', \App\Http\Controllers\AdminController::class);
    Route::resource('customer', \App\Http\Controllers\CustomerController::class);
    Route::resource('governorate', \App\Http\Controllers\Dashboard\governorateController::class);
    Route::resource('hall', \App\Http\Controllers\HallController::class);
    Route::resource('ownerofhalls', \App\Http\Controllers\OwnersOfHallsController::class);
    Route::resource('reservation', \App\Http\Controllers\Dashboard\reservation::class);
    Route::get('/reservation/{id}/{status}',[\App\Http\Controllers\Dashboard\reservation::class,'reserveStatus']);
    Route::resource('contacts', \App\Http\Controllers\Dashboard\ContactController::class);
}); 

Route::group(['prefix' => 'owner', 'middleware' => ['auth', 'IsCheck', 'IsOwner']], function () {

    Route::get('/',[\App\Http\Controllers\Controller::class,'ownerDashboard']);
});


Route::group(['prefix' => 'customer', 'middleware' => ['auth', 'IsCheck', 'IsCustomer']], function () {

   Route::get('/',[\App\Http\Controllers\Controller::class,'customerDashboard']);
});

Route::get('logout',[\App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');
