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

Route::get('/', 'App\Http\Controllers\InsertController@home');


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', 'App\Http\Controllers\Controller@chartData')->name('dashboard');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/chest', 'App\Http\Controllers\Controller@chest')->name('dashboard/chest');

// Route::middleware(['auth:sanctum', 'verified'])->get('/insert', 'App\Http\Controllers\InsertController@index')->name('insert');

Route::get('insert', 'App\Http\Controllers\InsertController@index')->name('insert')->middleware('auth');

Route::post('save', 'App\Http\Controllers\InsertController@save')->name('save')->middleware('auth');

// Route::middleware(['auth:sanctum', 'verified'])->get('/save', 'App\Http\Controllers\InsertController@save')->name('save');

Route::get('edit', 'App\Http\Controllers\InsertController@edit')->name('edit')->middleware('auth');

Route::get('edit/{id}', 'App\Http\Controllers\InsertController@editWithId')->name('editWithId')->middleware('auth');

Route::post('editSubmit', 'App\Http\Controllers\InsertController@editSubmit')->middleware('auth');

Route::get('delete/{id}', 'App\Http\Controllers\InsertController@delete')->name('delete')->middleware('auth');

