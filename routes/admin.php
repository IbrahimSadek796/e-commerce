<?php

use App\Http\Controllers\Admin\PagesContrpller;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\User\PagesController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PagesContrpller::class , 'showAll'])->name('');
Route::get('/men', [PagesContrpller::class , 'index'])->name('men');
Route::get('/kids', [PagesContrpller::class , 'showkids'])->name('kids');
Route::get('/women', [PagesContrpller::class , 'showwomen'])->name('women');






Route::resources([

    'posts'      => PostController::class,
    'users'      => PagesController::class,

]);


// Route::get('/admin/post', [PostController::class , 'index']);
// Route::get('/admin/post/create', [PostController::class , 'create']);
// Route::post('/admin/post', [PostController::class , 'store']);
// Route::get('/admin/post/{id}', [PostController::class , 'show']);
// Route::get('/admin/post/{id}/edit', [PostController::class , 'edit']);
// Route::put('/admin/post/{id}', [PostController::class , 'update']);
// Route::delete('/admin/post/{id}', [PostController::class , 'destory']);
