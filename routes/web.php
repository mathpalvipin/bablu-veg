<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Hermains where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/veg', 'vegController@veg');
Route::get('/fruit', 'vegController@fruit');


Route::post('/order', 'vegController@order');
Route::post('/add', 'vegController@fruitadd');

// Route::get('/fruits', 'vegController@fruitpage')->name('fruitpage');
// Route::get('/vegpage', 'routerController@vegpage')->name('vegpage');
// Route::get('/fruitpage', 'routerController@fruitpage')->name('fruitpage');
Route::get('/vue1/{vue_capture?}', function () {
 return view('welcome');
})->where('vue_capture', '[\/\w\.-]*');

