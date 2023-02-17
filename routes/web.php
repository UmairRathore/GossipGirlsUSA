<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Blogger\PostController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\MessagingController;
use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\ContactFormController;
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


Route::get('termsandpolicy', function () {
    return view('front.pages.termsandpolicy');
})->name('termsandpolicy');



Route::get('chatmodal', function () {
    return view('front.pages.chat.chat-modal');
})->name('chatmodal');



Route::get('/comingsoon', function () {
    return view('front.pages.comingsoon');
})->name('comingsoon');




//AUTH
Route::get('/dashboard', [RegistrationController::class, 'dashboard'])->name('dashboard');


//Authentication

//Login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'postLogin'])->name('postlogin');

//Logout
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

//Forget Password
Route::get('/forget', [LoginController::class, 'showForgetPasswordForm'])->name('forget.password');
Route::post('/forget', [LoginController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('/reset-password/{token}', [LoginController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('/reset-password', [LoginController::class, 'submitResetPasswordForm'])->name('reset.password.post');




//Registration
    //User Registration
Route::get('/usersignup', [RegistrationController::class, 'user'])->name('user-register');
Route::post('/usersignup', [RegistrationController::class, 'userregistration'])->name('userregisteration');
    //Blogger Registration
Route::get('/bloggersignup', [RegistrationController::class, 'blogger'])->name('blogger-register');
Route::post('/bloggersignup', [RegistrationController::class, 'bloggerregistration'])->name('bloggerregistration');


//Dashboard Edit Profile
Route::get('/profile/{id}', [UserController::class, 'edit'])->name('profile-edit')->middleware('auth');
Route::put('/profile/{id}', [UserController::class, 'update'])->name('profile-update');




//Front Pages
Route::get('/',[HomeController::class,'show'])->name('index');
Route::get('/about-us',[HomeController::class,'aboutus'])->name('about.us');

//Comment
    Route::post('/single/posts/{id}',[CommentController::class,'store'])->name('comments_store');
    Route::get('/single-posts/{id}',[HomeController::class,'singlePost'])->name('single.posts');

//User Profile Update
Route::get('/user-profile/{id}', [HomeController::class, 'edit'])->name('user.profile.edit')->middleware('auth');
Route::put('/user-profile/{id}', [HomeController::class, 'update'])->name('user.profile.update');

//ContactForm
    //save contact form
    Route::get('/contact', [ContactFormController::class,'create'])->name('contact.us');
    Route::post('/contact',[ContactFormController::class,'store'])->name('contact.store');
    //show contact
    Route::get('/contact-list', [AdminController::class, 'showcontact'])->name('contact-list')->middleware('auth');
    //delete contact
    Route::get('/contact-list/{id}', [ContactFormController::class, 'destroy'])->name('contact.delete')->middleware('auth');

//Roles List Pages
    Route::get('/admin-list', [AdminController::class, 'show'])->name('admin-list')->middleware('auth');
    Route::get('/users-list', [AdminController::class, 'showuser'])->name('users-list')->middleware('auth');
    Route::get('/bloggers-list', [AdminController::class, 'showblogger'])->name('bloggers-list')->middleware('auth');
    //Update Blogger Status
    Route::post('/status-user/{id}', [AdminController::class, 'changeStatus'])->name('status-user');
    //Delete User
    Route::get('/users-list/{id}', [AdminController::class, 'destroy'])->name('users.delete')->middleware('auth');

//BLogger Dashbaord Post CRUD
    Route::get('/posts/list',[PostController::class,'show'])->name('posts.show');
    Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
    Route::post('/posts/store',[PostController::class,'store'])->name('posts.store')->middleware('optimizeImages');
    Route::get('/posts/edit/{id}',[PostController::class,'edit'])->name('posts.edit');
    Route::put('/posts/update/{id}',[PostController::class,'update'])->name('posts.update')->middleware('optimizeImages');
    Route::get('/posts/delete/{id}',[PostController::class,'destroy'])->name('posts.destroy');


//BLogger Dashbaord Post CRUD
    Route::get('/admin/posts/list',[AdminController::class,'PostsLists'])->name('bloggersposts.show');
    Route::get('/admin/posts/delete/{id}',[AdminController::class,'Postsdestroy'])->name('bloggersposts.destroy');

//Background Image

    Route::get('/background/list',[AdminController::class,'Bg'])->name('bg.show');
    Route::get('/background/create',[AdminController::class,'createBg'])->name('bg.create');
    Route::post('/background/store',[AdminController::class,'storeBg'])->name('bg.store')->middleware('optimizeImages');
    Route::get('/background/create/{id}',[AdminController::class,'editBg'])->name('bg.edit');
    Route::put('/background/update/{id}',[AdminController::class,'updateBg'])->name('bg.update')->middleware('optimizeImages');


////Search Page
  Route::get('/search',[HomeController::class,'search'])->name('search');
//
////Search with Zipcode
  Route::get('/searchWithZipcode',[HomeController::class,'searchwithzipcode'])->name('search.zipcode');


//Bloggers Posts
  Route::get('BloggerPosts/{id}',[HomeController::class,'BloggerPosts'])->name('blogger.posts');


//Messaging
        Route::get('chat',[MessagingController::class,'show'])->name('chat');
        Route::post('storechat',[MessagingController::class,'store'])->name('store.chat');
