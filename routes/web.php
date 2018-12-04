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

Route::get('/reg_page', function () {
    return view('register');
});

Route::get('/', function () {
    return view('landing');
});
Route::post('/test','testController@login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('admin')->prefix('admin')->group(function(){
  Route::resource('series','SeriesController');
});
Route::prefix('debtor')->group(function(){
  Route::resource('debtors','DebtorController');
});
