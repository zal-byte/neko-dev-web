<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;    
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Models\User;
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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login_post'])->name('login_post');

Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup_post'])->name('signup_post');

Route::get('/blog-view/{id}', [BlogController::class, 'blog_view'])->name('blog-view');
Route::get('/blog', [BlogController::class, 'blog'])->name('blog');


Route::group(['middleware'=>'auth'], function(){
    
    Route::get('/home',[BlogController::class ,'home'])->name('home');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


    Route::get('/new-blog', [BlogController::class, 'new_blog'])->name('new-blog');
    Route::post('/new-blog', [BlogController::class, 'new_blog_post'])->name('new-blog-post');


    Route::get('/post/manage', [AdminController::class, 'postManage'])->name('postManage');

});