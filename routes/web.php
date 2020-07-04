<?php

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
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('login');
});
Route::get('user-level', 'HomeController@index');
//admin part
Route::group(['prefix'=>'admin'], function (){
//    Route::get('/', function (){
//        return view('login');
//    });
    Route::get('orders', 'HomeController@orders')->name('orders');
    Route::get('dashboard', 'HomeController@dashboard')->name('dashboard');
//    product crud
    Route::get('product', 'HomeController@product')->name('product');
    Route::get('product/add', 'ProductsController@index')->name('add-product');
    Route::post('product/add', 'ProductsController@store')->name('add-product');
    Route::get('product/update/{id}', 'ProductsController@edit')->name('update-product');
    Route::post('product/update/{id}', 'ProductsController@update');
    Route::get('product/delete/{id}', 'ProductsController@destroy')->name('delete-product');
//    end product
//    package CRUD
    Route::get('package', 'HomeController@package')->name('package');
    Route::get('package/add', 'PackagesController@index')->name('add-package');
    Route::post('package/add', 'PackagesController@store');
    Route::get('package/update/{id}', 'PackagesController@edit')->name('update-package');
    Route::post('package/update/{id}', 'PackagesController@update');
    Route::get('package/delete/{id}', 'PackagesController@destroy')->name('delete-package');


//    end package
//client CRUD
    Route::get('users/clients', 'HomeController@clients')->name('clients');
    Route::get('users/clients/new', 'HomeController@newClient')->name('addClient');
    Route::post('users/clients/new', 'HomeController@addClient');
    Route::get('users/clients/{id}', 'HomeController@updateGet')->name('updateClient');
    Route::post('users/clients/{id}', 'HomeController@updateClient')->name('updateClient');
    Route::get('users/clients/delete/{id}', 'HomeController@deleteClient' )->name('deleteClient');
//client end
//delivery CRUD
    Route::get('users/delivery-man', 'HomeController@deliveryMan')->name('delivery');
    Route::get('users/delivery-man/new', 'HomeController@newDeliveryMan')->name('addDelivery');
    Route::post('users/delivery-man/new', 'HomeController@addDeliveryMan');
    Route::get('users/delivery-man/{id}', 'HomeController@getDelivery')->name('delivery-update');
    Route::post('users/delivery-man/{id}', 'HomeController@updateDelivery');
    Route::get('users/delivery-man/delete/{id}', 'HomeController@deleteDelivery')->name('delete-delivery');
//delivery end
    Route::get('places', 'HomeController@places')->name('places');
//areas
    Route::get('areas', 'HomeController@areas')->name('areas');
    Route::post('areas/add', 'AreaController@store')->name('add-areas');
    Route::post('area/get', 'AreaController@show')->name('get-area');
    Route::post('areas/update/{id}', 'AreaController@update')->name('update-area');
    Route::get('areas/delete/{id}', 'AreaController@destroy')->name('delete-area');

});



//client part

Route::group(['prefix'=>'client'], function (){

    Route::get('dashboard', 'HomeController@cDashboard')->name('client-dashboard');
    Route::get('product-order/{id}', 'OrdersController@index')->name('product-order');
    Route::post('product-order/{id}', 'OrdersController@store');


    Route::get('catalog', 'HomeController@cCatalog')->name('catalog');
//    places
    Route::get('places', 'HomeController@cPlaces')->name('client-places');
    Route::get('places/add', 'HomeController@addPlace')->name('add-place');
    Route::post('places/add', 'HomeController@storePlace');
    Route::get('places/update/{id}', 'HomeController@getPlace')->name('update-place');
    Route::post('places/update/{id}', 'HomeController@updatePlace');
    Route::get('places/delete/{id}', 'HomeController@placeDestroy')->name('delete-place');
//    end places
//    order history start
    Route::get('order-history', 'HomeController@orderHistory')->name('order-history');
    Route::get('order-detail/{id}', 'OrderDetailController@index')->name('order-detail');
//    order history end
    Route::get('profile', 'HomeController@cProfile')->name('client-profile');
    Route::post('profile/{id}', 'HomeController@updateProfile')->name('update-profile');
});
//user part
Route::group(['prefix'=>'user'], function (){
//    Route::get('/', function (){
//       return view('login');
//    });
    Route::get('order-list', 'HomeController@orderList')->name('order-list');
    Route::get('profile', 'HomeController@cProfile')->name('user-profile');

});

Route::get('/config-cache', function() {

    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});
