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


use App\Events\TestEvent;

Route::get('/' , function () {
    return view('welcome') ;
});

// todo : handle the routing

Route::get('/fire' , function () {
    event(new TestEvent("12345" , 'message' , 'how are you bro'));
});

Route::get('/listen' , function () {
   return view('listen') ;
});
