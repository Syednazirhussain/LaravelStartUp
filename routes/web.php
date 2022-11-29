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
})->middleware('throttle:5,1');

Route::get('/check', function () {

    return "Nazir";
});


Route::get('/notify', function () {

    $email = "mohammadhamza180@gmail.com";
    broadcast(new \App\Events\PersonalNotification($email));

    return redirect()->back();
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/downloadPDF', 'HomeController@downloadPDF')->name('user.pdf.download');

Route::get('/author', 'HomeController@author')->name('author');
// Route::get('/books', 'HomeController@books')->name('books');
Route::get('/books', 'BookController@index')->name('books');
Route::get('/book/voucher/{id}', 'BookController@attachVoucher')->name('book.voucher');

Route::get('/hasOneThrough', 'HomeController@exampleHasOneThrough')->name('exampleHasOneThrough');
Route::get('/hasManyThrough', 'HomeController@exampleHasManyThrough')->name('exampleHasManyThrough');
Route::get('/userRoles', 'HomeController@getUserRoles')->name('getUserRoles');
Route::get('/roles', 'HomeController@getRoles')->name('getRoles');

// One To One (Polymorphic)
Route::get('/imagableUser', 'HomeController@imagableUser')->name('imagableUser');
Route::get('/imagablePost', 'HomeController@imagablePost')->name('imagablePost');


Route::get('/chats', 'ChatsController@index')->name('chat.index');
Route::get('/messages', 'ChatsController@fetchMessages');
Route::post('/messages', 'ChatsController@sendMessage');


Route::resource('cars', 'CarController', [
    'names' => [
        'index' => 'car.index',
    ]
]);

