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

Route::get('/', function () {
    return view('mainpage');
});
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/checkout', function () {
    return view('checkout');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/signup', function (){
    return view('signup');
});
// Route::get('/sport', function (){
//     return view('sport');
// });
Route::get('/admin', function () {
    return view('admin');
});
Route::get('/pay',function(){
    return view('pay');
});

Route::get('/adminhome',function(){
    return view('adminhome');
});

Route::post('/adminhome', ['uses' => 'AdminController@login']);
Route::post('/login', ['uses' => 'UserController@signup']);
Route::get('/adminlogout', ['uses' => 'AdminController@logout']);
Route::get('/orders', ['uses' => 'AdminController@getOrders']);
Route::get('/ordershistory', ['uses' => 'AdminController@getOrdersHistory']);
Route::get('/orderdetails/{id}', ['uses' => 'AdminController@getDetails']);
Route::patch('/confirmorder/{id}', ['uses' => 'AdminController@confirmOrder']);
Route::post('/main', ['uses' => 'UserController@login']);
Route::get('/logout', ['uses' => 'UserController@logout']);
Route::get('/sport', ['uses' => 'ProductController@getSport']);
Route::get('/horror', ['uses' => 'ProductController@getHorror']);
Route::get('/adventure', ['uses' => 'ProductController@getAdventure']);
Route::get('/strategy', ['uses' => 'ProductController@getStrategy']);
Route::get('/simulation', ['uses' => 'ProductController@getSimulation']);
Route::get('/details/{id}', ['uses' => 'ProductController@getDetails']);
Route::post('/addToCart/{id}', ['uses' => 'BillController@addToCart']);
Route::get('/checkout', ['uses'=>'BillController@getCart']);
Route::get('/history', ['uses'=>'BillController@getHistory']);
Route::delete('deleteItem/{id}', ['uses' => 'BillController@deleteItem']);
Route::patch('payItem/{id}', ['uses' => 'BillController@addPayment']);
Route::get('/test', ['uses' => 'GamekeyController@generateKey']);