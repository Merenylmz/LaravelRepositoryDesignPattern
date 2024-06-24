<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix("/posts")->group(function(){
    Route::get("/", [PostController::class, "getAllPosts"]);
    Route::post("/", [PostController::class, "addPost"]);
    Route::delete("/", [PostController::class, "deletePost"]);
    Route::post("/edit/{id}", [PostController::class, "editPost"]);
});

Route::prefix("/categories")->group(function(){
    Route::get("/", [CategoryController::class, "getAllCategories"]);
    Route::post("/", [CategoryController::class, "addCategory"]);
    Route::delete("/{id}", [CategoryController::class, "deleteCategory"]);
    Route::post("/edit/{id}", [CategoryController::class, "editCategory"]);
});