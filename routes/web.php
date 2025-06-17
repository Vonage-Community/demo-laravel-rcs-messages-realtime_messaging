<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\RcsController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/livewire', function () {
    return view('livewire');
});

Route::get('/rcs', [RcsController::class, 'index']);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
Route::post('/rcs', [RcsController::class, 'webhook'])->name('rcs.webhook');

require __DIR__.'/auth.php';
