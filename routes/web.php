<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'UserController@profile')->name('profile');

Route::get('/change-password', 'UserController@viewChangePassword')->name('viewChangePassword');

Route::post('/change-password/{id}', 'UserController@changePassword')->name('changePassword');

Route::get('/update-profile', 'UserController@viewUpdateProfile')->name('viewUpdateProfile');

Route::post('/update-profile/{id}', 'UserController@updateProfile')->name('updateProfile');


Route::resource('book', 'BookController');
Route::resource('borrow', 'BorrowController');

Route::get('book/destroy/{BookId}', 'BookController@destroy');
Route::post('borrow/add/{id}', 'BorrowController@addToBorrow')->name('addToBorrow');

Route::put('borrow/return/{id}', 'BorrowController@returnBook')->name('returnBook');

Route::get('book/update/{id}', 'BookController@edit')->name('editBook');
