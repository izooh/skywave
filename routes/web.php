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



Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


//Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('debtor')->group(function(){
  Route::resource('debtors','DebtorController');
});
Route::prefix('calls')->group(function(){
  Route::resource('call','CallController');
});

/*
routes to upload payment csv
*/
Route::middleware('admin')->prefix('payments')->group(function(){
Route::get('/payment', 'ImportController@getImport')->name('payment');
Route::post('/import_parse', 'ImportController@parseImport')->name('import_parse');
Route::post('/import_process', 'ImportController@processImport')->name('import_process');
});
