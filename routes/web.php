<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\UserController;

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
// 127.0.0.1:8000
Route::get('/',[HomeController::class , 'index']);
Route::get('/dashboard' , [HomeController::class , 'dashboard'])->middleware('admin');
Route::get('/students' , [StudentController::class , 'index'])->name('admin.index.students')->middleware('admin');  // get request {post(put, delete, patch) , get}
Route::get('/create-student',[StudentController::class , 'create'])->name('admin.create.student')->middleware('admin');
Route::post('/store-student',[StudentController::class,'store'])->name('admin.student.store')->middleware('admin');
Route::get('/edit-student/{id}',[StudentController::class, 'edit'])->name('admin.edit.student')->middleware('admin');
Route::post('/update-student',[StudentController::class,'update'])->name('admin.update.student')->middleware('admin');



Route::get('/posts',[PostController::class , 'list'])->name('admin.list.posts');
Route::get('/create-post',[PostController::class,'create'])->name('admin.create.post');
Route::post('/store-post',[PostController::class,'store'])->name('admin.store.post');

Route::group(['prefix' => 'user' , 'as' => 'auth.' , 'middleware' => 'guest'],function(){
    Route::get('login',[AuthController::class,'login'])->name('login');
    Route::post('login',[AuthController::class,'loginPost'])->name('login.post');
    Route::get('register',[AuthController::class,'registerForm'])->name('register.form');
    Route::post('register',[AuthController::class,'register'])->name('register.post');
});
Route::group(['middleware' => 'auth', 'prefix' => 'dashboard' , 'as' => 'user.'],function(){
    Route::get('home',[UserController::class,'index'])->name('index');

});
