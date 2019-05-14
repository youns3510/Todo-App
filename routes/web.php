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
    return view('welcome');
});

Route::get('/new', 'PageController@new');
Route::get('/todo', 'TodoController@index')->name('todo');
Route::post('/todo/store', 'TodoController@store')->name('todo.store');
Route::post('/todo/update/{id}', 'TodoController@update')->name('todo.update');
Route::get('/todo/delete/{id}', 'TodoController@destroy')->name('todo.delete');

Route::get('/todo/markAsComplete/{id}', 'TodoController@markAsComplete')->name('todo.markAsComplete');

