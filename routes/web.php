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

Route::get('/category/create', 'CategoriesController@create');
Route::post('/category/store', 'CategoriesController@store');
Route::get('/category/edit/{id}', 'CategoriesController@edit');
Route::post('/category/update/{id}', 'CategoriesController@update');
Route::get('/category/trydelete/{id}', 'CategoriesController@tryDelete');
Route::get('/category/delete/{id}', 'CategoriesController@delete');

Route::get('/category/{categoryId}', 'SubcategoriesController@index');
Route::get('/category/{categoryId}/create', 'SubcategoriesController@create');
Route::post('/category/{categoryId}/store', 'SubcategoriesController@store');

Route::get('/subcategory/{subcategoryId}', 'SetsController@index');
Route::get('/subcategory/{subcategoryId}/delete/{id}', 'SetsController@destroy');
Route::get('/subcategory/{subcategoryId}/create', 'SetsController@create');
Route::post('/subcategory/{subcategoryId}/store', 'SetsController@store');
Route::get('/subcategory/{subcategoryId}/edit/{id}', 'SetsController@edit');
Route::post('/subcategory/{subcategoryId}/update/{id}', 'SetsController@update');



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