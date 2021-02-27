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

Route::get('/', 'App\Http\Controllers\ContentsController@home')->name('home');
Route::get('/clients', 'App\Http\Controllers\ClientController@index')->name('clients');
Route::get('/clients/new', 'App\Http\Controllers\ClientController@newclient')->name('new_client');
Route::post('/clients/new', 'App\Http\Controllers\ClientController@create')->name('create_client');
Route::get('/clients/{client_id}', 'App\Http\Controllers\ClientController@show')->name('show_client');
Route::post('/clients/{client_id}', 'App\Http\Controllers\ClientController@modify')->name('update_client');

Route::get('/reservations/{client_id}', 'App\Http\Controllers\RoomsController@checkAvailableRooms')->name('check_room');
Route::post('/reservations/{client_id}', 'App\Http\Controllers\RoomsController@checkAvailableRooms')->name('create_room');

Route::get('/book/room/{client_id}/{room_id}/{date_in}/{date_out}', 'App\Http\Controllers\ReservationsController@bookRoom')->name('book_room');


Route::get('/about', function () {
    $response_arr = [];
    $esponse_arr['author'] = 'BP';
    $response_arr['version'] = '1.1.1';
    return $response_arr;
});

Route::get('/home', function () {
    $data = [];
    $data['version'] = '1.1.1';
    return view('welcome', $data);
});

Route::get('/di', 'App\Http\Controllers\ClientController@di');

Route::get('/facades/db', function () {
    return DB::select('SELECT * from table');
});

Route::get('/facades/encrypt', function () {
    return Crypt::encrypt('123456789');
});


Route::get('/facades/decrypt', function () {
    return Crypt::decrypt('eyJpdiI6Ik4yNDJ1RnRoY2lyelNyQzV4S3oxOXc9PSIsInZhbHVlIjoiWDBZdGpVRzk0eEhwd3E2QlFybUJSam8zQW5wMGpIdEpmMG10MDErUVdyQT0iLCJtYWMiOiI0OTAzMjJkODBlNDU1NTlkOWVkMWMxYzJjMDAyZjRlNjA3N2I0MWZhYmYzYzZmODRmY2ExNmVmNzIwZDM4ZDNiIn0=');
});
