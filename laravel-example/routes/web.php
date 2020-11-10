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
});

Route::get('/test', function() {
    echo 'Test GET';
});

Route::post('/test', function() {
    echo 'Test POST';
});

Route::patch('/test', function() {
    echo 'Test PATCH';
});

Route::PUT('/test', function() {
    echo 'Test PUT';
});

Route::DELETE('/test', function() {
    echo 'Test DELETE';
});