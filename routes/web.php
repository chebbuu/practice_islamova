<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'mainPage'])->name('main');

Route::middleware('auth')->group(function () {
    Route::post('/task', [TaskController::class, 'create'])->name('task.create');
    Route::delete('/task/{task}', [TaskController::class, 'delete'])->name('task.delete');
    Route::post('/task/{task}', [TaskController::class, 'update'])->name('task.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
