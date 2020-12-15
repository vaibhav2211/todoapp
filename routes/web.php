<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

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

Route::middleware("requiredLogin")->group(function(){
    //home page route
    Route::get('/',[TodoController::class,'homeView']);
    //todo form 
    Route::view('/add-todo','addTodo');
    //add todo
    Route::post("/add-todo",[TodoController::class,'addTodo']);
    //complete task
    Route::get("/complete/{id}",[TodoController::class,'completeTodo']);
    //deleting todo
    Route::get("/delete/{id}",[TodoController::class,'deleteTodo']);
    //user profile page
    Route::get("/profile",[UserProfileController::class,'getProfile']);
    //update user details
    Route::post("/profile",[UserProfileController::class,'updateUser']);
    //change password view
    Route::view("/change-password","changePassword");
    //change password
    Route::post("/change-password",[UserProfileController::class,'changePassword']);
});
Route::middleware("checkLogin")->group(function(){
    //login routes start
    //login form
    Route::view("/login",'login');
    //user login
    Route::post("/login",[LoginController::class,'userLogin']);
    //login routes end

    //registration routes start
    //register form
    Route::view("/register","register");
    //registering user
    Route::post('/register',[RegisterController::class,'registerUser']);
    //verifying user email
    Route::get('/verify',[RegisterController::class,'verifyUser']);
    //registeration routes end
});
//forgot password routes
Route::view("/forgot-password","forgotPassword");
Route::post('/forgot-password',[UserProfileController::class,'forgotPassword']);
Route::get('reset-password',[UserProfileController::class,'resetPasswordForm']);
Route::post('reset-password',[UserProfileController::class,'resetPassword']);
Route::get('/logout',[LoginController::class,'logoutUser']);