<?php

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/explore/posts', function () {
    /*dd(Post::all()->load('user'));
    dd(Post::with('user')->get());*/
    return view('/posts/explore',['posts'=>Post::with('user')->orderBy('id','DESC')->get()]);
})->name('posts.explore');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/posts', function (Request $request) {
        return view('posts/index',array(
            'posts'=>$request->user()->posts
        ));
    })->name('posts.index');
    
    Route::get('/posts/new', [PostController::class, 'new']);
    Route::post('/posts/new', [PostController::class, 'store']);
    Route::get('/posts/{id}/edit', [PostController::class, 'edit']);
    Route::put('/posts/{id}/update', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{id}/delete',[PostController::class, 'delete'])->name('posts.delete');



   
});
