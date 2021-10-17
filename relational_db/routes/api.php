<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//USER ROUTE
//PUBLIC ROUTE
Route::get("users",[UserController::class,"index"]);
Route::get("users/{id}",[UserController::class,"show"]);
//PRIVATE ROUTE
Route::post("users",[UserController::class,"store"]);
Route::put("users/{id}",[UserController::class,"update"]);
Route::delete("users/{id}",[UserController::class,"destroy"]);


//PROFILE ROUTE
//PUBLIC ROUTE
Route::get("profiles",[ProfileController::class,"index"]);
Route::get("profiles/{id}",[ProfileController::class,"show"]);
//PRIVATE ROUTE
Route::post("profiles",[ProfileController::class,"store"]);
Route::put("profiles/{id}",[ProfileController::class,"update"]);
Route::delete("profiles/{id}",[ProfileController::class,"destroy"]);

//ROLE ROUTE
//PUBLIC ROUTE
Route::get("roles",[RoleController::class,"index"]);
Route::get("roles/{id}",[RoleController::class,"show"]);
//PRIVATE ROUTE
Route::post("roles",[RoleController::class,"store"]);
Route::put("roles/{id}",[RoleController::class,"update"]);
Route::delete("roles/{id}",[RoleController::class,"destroy"]);

//POST ROUTE
//PUBLIC ROUTE
Route::get("posts",[PostController::class,"index"]);
Route::get("posts/{id}",[PostController::class,"show"]);
//PRIVATE ROUTE
Route::post("posts",[PostController::class,"store"]);
Route::put("posts/{id}",[PostController::class,"update"]);
Route::delete("posts/{id}",[PostController::class,"destroy"]);

//COMMENT ROUTE
//PUBLIC ROUTE
Route::get("comments",[CommentController::class,"index"]);
Route::get("comments/{id}",[CommentController::class,"show"]);
//PRIVATE ROUTE
Route::post("comments",[CommentController::class,"store"]);
Route::put("comments/{id}",[CommentController::class,"update"]);
Route::delete("comments/{id}",[CommentController::class,"destroy"]);