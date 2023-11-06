<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserFeedBackController;
use Illuminate\Support\Facades\Auth;

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
// ********************************************************************

Auth::routes();
Route::get('/',function(){ return view('auth.login');});
Route::get('/user_register_index',[RegisterController::class,'register'])->name('user.register.index');
Route::post('/user_register',[RegisterController::class,'userRegister'])->name('user.register');
Route::middleware('auth')->group(function () {
Route::get('/admin_login_index',[AdminController::class,'Admin_index'])->name('Admin_index');
Route::get('/admin_dashboard',[HomeController::class,'dashboard_index'])->name('dashboard_index');
Route::post('/admin_dashboard_post',[LoginController::class,'dashboard_index_post'])->name('dashboard_index_post');

Route::get('/user-feedback',[UserFeedBackController::class,'index'])->name('feedback');
Route::post('/user-feed-back',[UserFeedBackController::class,'create'])->name('user.feed.back.create');
Route::post('/feedback-comment/{id}',[UserFeedBackController::class,'storeComment'])->name('user.feedback.comment');
Route::get('/feedback-detail/{id}',[UserFeedBackController::class,'feedback_show'])->name('feedback.show');



Route::post('/user_dash',[LoginController::class,'user_dash'])->name('user_dash');
Route::get('users',[UserController::class,'index'])->name('user.index');
Route::get('user-delete/{id}',[UserController::class,'delete'])->name('user.delete');
Route::get('comments',[CommentController::class,'index'])->name('comment.index');
Route::get('comment-update/{id}',[CommentController::class,'update'])->name('comment.update');

Route::get('logout',function(){
    Auth::logout();
    return redirect('login');
})->name('logout');

});



