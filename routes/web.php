<?php

use App\Http\Controllers\AdminCategoryController;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;


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

Route::get('/storage-link/', function(){
    $targetFolder = base_path().'storage/app/public';
    $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';
    symlink($targetFolder, $linkFolder);
});

Route::get('/', function () {
    return view('home', [
        "title" => "Laporin",
        // "posts" => Post::where('category_id', 1)->get()
        "posts" => Post::latest()->where('category_id',1)->get(),
        "informasi" => Post::latest()->where('category_id',5)->get()
    ]);
});


Route::get('/blog', [PostController::class, 'blog']);

Route::get('/login',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class, 'authenticate']);
Route::post('/logout',[LoginController::class, 'logout']);

// Register Mati
Route::get('/register',[RegisterController::class, 'index'])->middleware('guest');

Route::post('/register',[RegisterController::class, 'store']);
// Register Mati Ends

Route::get('/dashboard',function(){
    return view('dashboard.index',[
        "title" => "Laporan",
    ]);
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');


Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('auth');

// Halaman Single Posts
route::get('posts/{post:slug}', [PostController::class,'show']);