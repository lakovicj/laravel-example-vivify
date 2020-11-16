<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    return response('Testing GET method route...', 200);
})->name('get');

Route::get('/test/{id}', function($id) {
    return response("Getting entity with id=$id", 200);
})->name('getOne');


Route::post('/test', function(Request $request) {

    if ($request->has('name')) {
        return Response("Creating new entity with param name=$request->name", 201);
    }
    return response("Creating new entity....", 201);
})->name('create');

Route::patch('/test', function() {
    return response("Patch", 200);
})->name('patch');

Route::put('/test/{id}', function($id, Request $request) {
    // we can access request params through $request
    return response("Entity with id=$id is being edited.");
})->name('edit');

Route::delete('/test/{id}', function($id) {
    return response("Deleting entity with id=$id", 200);
})->name('remove');

