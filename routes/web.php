<?php


use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'index'])->name('main');

Route::middleware('auth')->name('task.')->prefix('task')->group(function () {
    Route::post('/', [TaskController::class, 'create'])->name('create');
    Route::delete('/{task}', [TaskController::class, 'delete'])->name('delete');
    Route::post('/{task}', [TaskController::class, 'update'])->name('update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
