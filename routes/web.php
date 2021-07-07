<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/posts/index',[PostsController::class,('index')])->name('posts.index');

Route::get('/posts/create',[PostsController::class,('create')])->middleware(['auth'])->name('posts.create');

Route::post('/posts/store',[PostsController::class,('store')])->middleware(['auth'])->name('posts.store');

Route::get('/posts/show/{id}',[PostsController::class,('show')])->name('posts.show');

Route::get('/posts/edit/{id}',[PostsController::class,('edit')])->name('posts.edit')->middleware(['auth']);

Route::delete('/posts/delete/{id}',[PostsController::class,('destroy')])->name('posts.delete')->middleware(['auth']);

Route::put('/posts/update/{id}',[PostsController::class,('update')])->name('posts.update')->middleware(['auth']);