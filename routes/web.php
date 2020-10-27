<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('insert', 'App\Http\Controllers\InsertController@index')->name('insert');

Route::post('save', 'App\Http\Controllers\InsertController@save')->name('save');

Route::get('edit', 'App\Http\Controllers\InsertController@edit')->name('edit');

Route::get('edit/{id}', 'App\Http\Controllers\InsertController@editWithId')->name('editWithId');

Route::post('editSubmit', 'App\Http\Controllers\InsertController@editSubmit');

Route::get('delete/{id}', 'App\Http\Controllers\InsertController@delete')->name('delete');

