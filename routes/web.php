<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\KategorieZjawiskController;
use App\Http\Controllers\KategorieForumController;
use App\Http\Controllers\ZjawiskoController;
use App\Http\Controllers\PlanetaController;
use App\Http\Controllers\KsiezycController;
use App\Http\Controllers\UzytkownikController;
use App\Http\Controllers\WatekController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\KomentarzController;
use App\Http\Controllers\ProfileController;

// Strona powitalna
Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Trasy zarządzania profilem użytkownika, z uwierzytelnieniem
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Trasy dla różnych modeli, każdy kontroler używa metod resource dla CRUD
Route::resource('role', RoleController::class);
Route::resource('kategorie_zjawisk', KategorieZjawiskController::class);
Route::resource('kategorie_forum', KategorieForumController::class);
Route::resource('zjawiska', ZjawiskoController::class);
Route::resource('planety', PlanetaController::class);
Route::resource('ksiezyce', KsiezycController::class);
Route::resource('uzytkownicy', UzytkownikController::class);
Route::resource('watki', WatekController::class);
Route::resource('posty', PostController::class);
Route::resource('komentarze', KomentarzController::class);

// Auth routes (zakładając, że są generowane przez Laravel Breeze, Jetstream, itp.)
require __DIR__.'/auth.php';
