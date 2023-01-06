<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Blogger\PostController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegistrationController;


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


Route::get('/users', function () {
    return view('layouts.back.user');
})->name('back.user');


Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

//Route::get('/', function () {
//    return view('front.pages.index');
//})->name('index');

Route::get('termsandpolicy', function () {
    return view('front.pages.termsandpolicy');
})->name('termsandpolicy');

//Route::get('/about-us', function () {
//    return view('front.pages.about-us');
//})->name('about-us');

Route::get('/comingsoon', function () {
    return view('front.pages.comingsoon');
})->name('comingsoon');

Route::get('/contact', function () {
    return view('front.pages.contact');
})->name('contact.us');

//Route::get('/single-posts', function () {
//    return view('front.pages.single-post');
//})->name('single-posts');
//



//AUTH
Route::get('/dashboard', [RegistrationController::class, 'dashboard'])->name('dashboard')->middleware('auth');;


Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'postLogin'])->name('postlogin');



Route::post('logout', [LoginController::class, 'logout'])->name('logout');
//Route::posts('/{', [LoginController::class, 'logout'])->name('user-logout');
//Route::posts('/logout', [LoginController::class, 'logout'])->name('blogger-logout');



Route::get('/usersignup', [RegistrationController::class, 'user'])->name('user-register');
Route::post('/usersignup', [RegistrationController::class, 'userregistration'])->name('userregisteration');

Route::get('/bloggersignup', [RegistrationController::class, 'blogger'])->name('blogger-register');
Route::post('/bloggersignup', [RegistrationController::class, 'bloggerregistration'])->name('bloggerregistration');



Route::get('/profile/{id}', [UserController::class, 'edit'])->name('profile-edit')->middleware('auth');
Route::put('/profile/{id}', [UserController::class, 'update'])->name('profile-update');



Route::get('/',[HomeController::class,'show'])->name('index');
Route::get('/about-us',[HomeController::class,'aboutus'])->name('about.us');
Route::get('/single-posts/{id}',[HomeController::class,'singlePost'])->name('single.posts');



    Route::get('/admin-list', [AdminController::class, 'show'])->name('admin-list')->middleware('auth');
    Route::get('/users-list', [AdminController::class, 'showuser'])->name('users-list')->middleware('auth');
    Route::get('/bloggers-list', [AdminController::class, 'showblogger'])->name('bloggers-list')->middleware('auth');
    Route::post('/status-user/{id}', [AdminController::class, 'changeStatus'])->name('status-user');


    Route::get('/posts/list',[PostController::class,'show'])->name('posts.show');
    Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
    Route::post('/posts/store',[PostController::class,'store'])->name('posts.store');
    Route::get('/posts/edit/{id}',[PostController::class,'edit'])->name('posts.edit');
    Route::put('/posts/update/{id}',[PostController::class,'update'])->name('posts.update');
    Route::get('/posts/delete/{id}',[PostController::class,'destroy'])->name('posts.destroy');


