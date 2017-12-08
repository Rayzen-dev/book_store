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
    return view('auth/login');
});

Auth::routes();
Event::listen('user.login', function (){
    if(Auth::check()){
        return Redirect::to('home');
    }
});

Route::get('/home', 'HomeController@index')->name('home');

# Books section
Route::get('/book', 'BooksController@index');
Route::get('/book/create', 'BooksController@create');
Route::post('/book/create', 'BooksController@addBook');
Route::get('/book/delete/{id}', 'BooksController@delete');
Route::get('/book/update/{id}', 'BooksController@update');
Route::post('/book/update/{id}', 'BooksController@updateBook');


# Customers section
Route::get('/customer', 'CustomersController@index');
Route::get('/customer/create', 'CustomersController@create');
Route::post('/customer/create', 'CustomersController@addCustomer');
Route::get('/customer/delete/{id}', 'CustomersController@delete');
Route::get('/customer/update/{id}', 'CustomersController@update');
Route::post('/customer/update/{id}', 'CustomersController@updateCustomer');
Route::get('/customer/profile/{id}', 'CustomersController@read');
Route::get('/customer/profile/{id}/loan', 'CustomersController@loan');
Route::post('/customer/profile/{id}/loan', 'LoanController@addLoan');

# Loans section
Route::get('/loan', 'LoanController@index');
Route::get('/loan/delete/{customer_id}/{book_id}', 'LoanController@delete');