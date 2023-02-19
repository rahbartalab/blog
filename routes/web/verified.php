<?php

use App\Http\Controllers\Blog\CategoryController;
use App\Http\Controllers\Blog\CommentController;
use App\Http\Controllers\Blog\PostController;
use App\Http\Controllers\Blog\TagController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Role\RoleController;


Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
Route::resource('categories', CategoryController::class);
Route::resource('tags', TagController::class);
Route::resource('posts', PostController::class);
/* --!> in admin panel we don't have ( create & store ) for comments <!-- */
Route::resource('comments', CommentController::class)->except('show', 'store', 'create');
