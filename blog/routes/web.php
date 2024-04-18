<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])->name('posts.index');


Route::middleware (['auth'])->group(function() {

    Route::resource('posts', PostController::class) 
    ->except('index');
    
    Route::get('/dashboard', [DashboardController::class, 'index'] ) ->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::middleware(['admin'])->name('admin.')->prefix('admin')->group(function () {
        Route::resource('posts', AdminPostController::class);
    });
});




require __DIR__.'/auth.php';
