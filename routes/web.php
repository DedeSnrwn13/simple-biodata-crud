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

Route::get('/belajar', function() {
    $data = [
        ['judul' => 'ini adalah judul'],
        ['judul' => 'ini adalah judul'],
        ['judul' => 'ini adalah judul'],
        ['judul' => 'ini adalah judul'],
        ['judul' => 'ini adalah judul']
    ];
    return view('belajar/list', compact('data'));
});

Route::get('/belajar/lagi', 'BelajarController@index');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('biodata', 'BiodataController');
Route::post('biodata/pencarian', 'BiodataController@cari')->name('biodata.pencarian');


// route yg pake vue
Route::resource('biodatavue', 'BiodatavueController');