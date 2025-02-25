<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/////////////////////GET///////////////////////
Route::get('/', [MainController::class, 'mainPage'])->name('main');


/////////////////////POST///////////////////////
Route::post('/addTask', [PostController::class, 'addTask']);
Route::post('/deleteTask', [PostController::class, 'deleteTask']);
Route::post('/updateTask', [PostController::class, 'updateTask']);


/////////////////////AUTH///////////////////////
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
