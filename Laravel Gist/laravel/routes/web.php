<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::redirect('/here', '/there', 301);  

Route::get('/user/{id}', function (string $id) {
    return 'User '.$id;
    return to_route('welcome');
});


Route::get('/username/{name?}', function (string $name = 'John') {
    return $name;
});


Route::get('/username1/{id}/{name}', function (string $id, string $name) {
    return 'USER -- ' . $id  . ' -- ' . $name ; 
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);

Route::get('/search/{search}', function (string $search) {
    return $search;
})->where('search', '.*');


Route::prefix('flan')->group(function () {
    Route::get('/users', function (Request $request) {
        // return $request->ip(); 

        $route = Route::current(); // Illuminate\Routing\Route
        $name = Route::currentRouteName(); // string
        $action = Route::currentRouteAction(); // string

        dd($route->uri) ; 

        // var_dump($this->route()) ; 
    })->name('test-route');
});


Route::fallback(function () {
    return 'TEAM FALLBACK'; 
});

