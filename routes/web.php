<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
Route::get('/hello/{name}', function ($name) {
    return 'Hello '.$name;
});
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'App\Http\Controllers\PagesController@index');
Route::get('/about', 'App\Http\Controllers\PagesController@about');
Route::get('/services', 'App\Http\Controllers\PagesController@services');

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::resource('posts', 'App\Http\Controllers\PostsController');

Route::get('/recipes/design', 'App\Http\Controllers\RecipesController@design');
Route::resource('recipes', 'App\Http\Controllers\RecipesController');

Auth::routes();



