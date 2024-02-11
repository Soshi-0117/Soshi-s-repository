<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ItemController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function () {
    //以下はホーム画面
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //以下はユーザー
    Route::controller(UserController::class)->prefix('users')->name('users.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{user}/edit', 'edit')->name('edit');
        Route::patch('/{user}', 'update')->name('update');
        Route::delete('/{user}', 'destroy')->name('destroy');
    });

        //以下はカテゴリー
        Route::controller(CategoryController::class)->prefix('categories')->group(function () {
            Route::get('', 'index')->name('categories');
            Route::get('create', 'create')->name('categories.create');
            Route::post('store', 'store')->name('categories.store'); 
            Route::get('show/{id}', 'show')->name('categories.show');
            Route::get('edit/{id}', 'edit')->name('categories.edit');
            Route::put('edit/{id}', 'update')->name('categories.update');
            Route::delete('destroy/{id}', 'destroy')->name('categories.destroy');
        });

        //以下は商品
        Route::controller(ItemController::class)->prefix('items')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/search1', 'search1')->name('search1');
            Route::get('/search2', 'search2')->name('search2');
            Route::get('/search3', 'search3')->name('search3');
            Route::get('/add', 'add')->name('add');
            Route::post('/add', 'add')->name('add');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::post('/{id}', 'update')->name('update');
            Route::get('/{id}', 'destroy')->name('destroy');
        });


});