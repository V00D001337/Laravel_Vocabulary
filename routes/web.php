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

Auth::routes();

Route::get('/home', 'CategoriesController@index')->name('home');

Route::get('/category/{categoryId}', 'SubcategoriesController@index');

Route::get('/pieczywo', 'PieczywoController@index');
Route::get('/pieczywo/create', 'PieczywoController@create');
Route::post('/pieczywo/store', 'PieczywoController@store');
Route::get('/pieczywo/edit/{id}', 'PieczywoController@edit');
Route::post('/pieczywo/update/{id}', 'PieczywoController@update');
Route::get('/pieczywo/trydelete/{id}', 'PieczywoController@tryDelete');
Route::get('/pieczywo/delete/{id}', 'PieczywoController@delete');

Route::get('/piekarz', 'PiekarzController@index');
Route::get('/piekarz/create', 'PiekarzController@create');
Route::post('/piekarz/store', 'PiekarzController@store');
Route::get('/piekarz/edit/{id}', 'PiekarzController@edit');
Route::post('/piekarz/update/{id}', 'PiekarzController@update');
Route::get('/piekarz/trydelete/{id}', 'PiekarzController@tryDelete');
Route::get('/piekarz/delete/{id}', 'PiekarzController@delete');

Route::get('workers', 'PracownikController@index');
Route::get('workers/create', 'PracownikController@create');
Route::get('workers/edit/{id}', 'PracownikController@edit');
Route::get('workers/destroy/{id}', 'PracownikController@destroy');
Route::post('workers/store', 'PracownikController@store');
Route::post('workers/update/{id}', 'PracownikController@update');