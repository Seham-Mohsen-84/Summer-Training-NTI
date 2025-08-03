<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FinalAppController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [FinalAppController::class, 'index1'])->name('dashboard');

Route::get('/', fn () => view('welcome'))->name('home');
Route::get('/articles', [FinalAppController::class, 'index'])->name('articles.index');


Route::get('/dashboard', [FinalAppController::class, 'index1'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/test', function () {
    return view('test');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    // Resource routes for articles (create, store, edit, update, destroy, show)
    // except(['index']) means skip index route (already defined above)
    Route::resource('articles', FinalAppController::class)->except(['index']);
});
