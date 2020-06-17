<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/getCartCount','UserController@getCartCount');
Route::post('/signup','UserController@signup');
Route::post('/login','UserController@login');
Route::get('/getSport', 'ProductController@getSport');
Route::get('/getAdventure', 'ProductController@getAdventure');
Route::get('/getHorror', 'ProductController@getHorror');
Route::get('/getSimulation', 'ProductController@getSimulation');
Route::get('/getStrategy', 'ProductController@getStrategy');
Route::get('/getDetail','ProductController@getDetails');
Route::patch('/addToCart','BillController@addToCart');
Route::get('/getCart','BillController@getCart');
Route::get('/getBillID','BillController@getBillID');
Route::get('/getBills','BillController@getBills');
Route::get('/getHistory','BillController@getHistory');
Route::delete('/deleteItem','BillController@deleteItem');
Route::patch('/addPayment','BillController@addPayment');
Route::post('/adminlogin','AdminController@login');
Route::get('/getOrders','AdminController@getOrders');
Route::get('/getOrderHistory','AdminController@getOrdersHistory');
Route::get('/getOrderDetails','AdminController@getDetails');
Route::patch('/confirmOrder1', 'AdminController@confirmOrder1');
Route::patch('/confirmOrder2', 'AdminController@confirmOrder2');