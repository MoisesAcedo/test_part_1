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

use App\Http\Controllers\ItemController;
use App\Item;
use Illuminate\Http\Request;


Route::get('/', 'ItemController@welcome')->name('welcome');

//list all elements
Route::get('/list-items', 'ItemController@showAll')->name('showAll');

//list element with that name 
Route::post('list-item', 'ItemController@showOne')->name('showOne');

//insert a new element
Route::post('create-item', 'ItemController@store')->name('create');

//update item
Route::get('update-item', 'ItemController@update')->name('update');

//delete item
Route::get('delete-item', 'ItemController@delete')->name('delete');
