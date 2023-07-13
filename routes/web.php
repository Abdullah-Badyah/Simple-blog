<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CatesController;

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
    return redirect()->route('posts.index');
});

Route::get('/home', function () {
    return redirect()->route('posts.index');
});

// Route::get('posts/test', function () {
//     return redirect()->route('posts.test');
// });

Route::get('/controlPanel', [PostsController::class, 'controlPanel'])->name('posts.controlPanel');

Route::resource('posts', PostsController::class);
Route::resource('cates', CatesController::class);

Auth::routes();

Route::get('/categories/{category}', [CatesController::class, 'show'])->name('cates.show');
Route::get('/posts/publish/{post}', [PostsController::class, 'publish'])->name('posts.publish');

Route::get('/search', [App\Http\Controllers\SearchController::class, 'search'])->name('search');
// Route::get('/search/index', [App\Http\Controllers\SearchController::class, 'index'])->name('search.index');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
