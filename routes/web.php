<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('dashboard', function () {
    return view('dashboard', [
        'users' => \App\Models\User::query()->whereNot('id', auth()->user()->id)->get()
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('chat/{id}', function ($id) {
    return view('chat', [
        'id' => $id
    ]);
})->middleware(['auth', 'verified'])->name('chat');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
