<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('chat.index');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('chat', [MessageController::class, 'index'])->name('chat.index');
    Route::get('chat/create', [MessageController::class, 'create'])->name('chat.create');
    Route::post('chat', [MessageController::class, 'store'])->name('chat.store');
    Route::get('chat/{chat}', [MessageController::class, 'show'])->name('chat.show');
    Route::get('chat/{chat}/edit', [MessageController::class, 'edit'])->name('chat.edit');
    Route::put('chat/{chat}', [MessageController::class, 'update'])->name('chat.update');
    Route::delete('chat/{chat}', [MessageController::class, 'destroy'])->name('chat.destroy');
});

Route::middleware('guest')->group( function () {
    Route::get('login', [AuthController::class, 'signIn'])->name('sign-in');
    Route::get('register', [AuthController::class, 'signUp'])->name('sign-up');
    Route::post('sign-up', [AuthController::class, 'register'])->name('register');
    Route::post('sign-in', [AuthController::class, 'login'])->name('login');

});
