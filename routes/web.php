<?php

use App\Sets;

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
    Session::forget('categoryId');
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'CategoriesController@index')->name('home');

Route::get('/category/create', 'CategoriesController@create');
Route::post('/category/store', 'CategoriesController@store');
Route::get('/category/edit/{id}', 'CategoriesController@edit');
Route::post('/category/update/{id}', 'CategoriesController@update');
Route::get('/category/delete/{id}', 'CategoriesController@delete');

Route::get('/category/{categoryId}', 'SubcategoriesController@index');
Route::get('/category/{categoryId}/create', 'SubcategoriesController@create');
Route::post('/category/{categoryId}/store', 'SubcategoriesController@store');
Route::get('/category/{categoryId}/edit/{id}', 'SubcategoriesController@edit');
Route::post('/category/{categoryId}/update/{id}', 'SubcategoriesController@update');
Route::get('/category/{categoryId}/delete/{id}', 'SubcategoriesController@destroy');

Route::get('/language', 'LanguagesController@index');
Route::get('/language/create', 'LanguagesController@create');
Route::post('/language/store', 'LanguagesController@store');
Route::get('/language/edit/{id}', 'LanguagesController@edit');
Route::post('/language/update/{id}', 'LanguagesController@update');
Route::get('/language/destroy/{id}', 'LanguagesController@destroy');

Route::get('/subcategory/{subcategoryId}', 'SetsController@index');
Route::get('/subcategory/{subcategoryId}/delete/{id}', 'SetsController@destroy');
Route::get('/subcategory/{subcategoryId}/create', 'SetsController@create');
Route::post('/subcategory/{subcategoryId}/store', 'SetsController@store');
Route::get('/subcategory/{subcategoryId}/edit/{id}', 'SetsController@edit');
Route::post('/subcategory/{subcategoryId}/update/{id}', 'SetsController@update');


Route::get('/set/{setId}', function($setId){
    Session::put('setId', $setId);
    return view('other.mode', compact('setId'));
});
Route::get('/set/{setId}/mode/{mode}', function($setId, $mode){
    if($mode == 0){
        $set = Sets::find($setId);
        return view('other.learning', compact('setId', 'set'));
    }
    else if($mode == 1){
        $set = Sets::find($setId);
        return view('other.test', compact('setId', 'set'));
    }
    return view('other.learning', compact('setId'));
});

Route::get('/set/{setId}/learning', function($setId){
    $set = Sets::find($setId);
    return view('other.showSet', compact('setId', 'set'));
});

Route::get('/set/{setId}/exam/{examId}', function($setId, $examId){
    return view('other.algorithm', compact('setId', 'examId'));
});

Route::get('/set/{setId}/exam/{examId}/algorithm/{algorithmId}', 'ExamController@start');
Route::post('/exam', 'ExamController@getNewWord');
Route::get('/exam/result', 'ExamController@end');

Route::get('/result', 'ResultsController@index');

Route::get('/user', 'UserController@index');