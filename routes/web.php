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
use App\Http\Controllers\PublicPlanetaController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\PublicKsiezycController;
use App\Http\Controllers\PublicZjawiskoController;
use App\Http\Controllers\ForumController;

// Strona powitalna
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Trasy logowania, rejestracji, resetowania hasła dostępne dla gości
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});

// Dashboard - dostępny tylko po uwierzytelnieniu i weryfikacji
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Trasy zarządzania profilem użytkownika, z uwierzytelnieniem
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, 'verify'])
        ->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')->name('verification.send');
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

// Trasy dla różnych modeli, z ograniczeniem dostępu dla administratorów
Route::middleware(['auth', \App\Http\Middleware\EnsureUserHasAdminRole::class])->group(function () {
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
});

Route::get('/public/planety', [PublicPlanetaController::class, 'index'])->name('publicplanety.index');
Route::get('/public/planety/{planeta}', [PublicPlanetaController::class, 'show'])->name('publicplanety.show');

Route::get('/public/ksiezyce', [PublicKsiezycController::class, 'index'])->name('publicksiezyce.index');
Route::get('/public/ksiezyce/{ksiezyc}', [PublicKsiezycController::class, 'show'])->name('publicksiezyce.show');

Route::get('/public/zjawiska', [PublicZjawiskoController::class, 'index'])->name('publiczjawiska.index');
Route::get('/public/zjawiska/{zjawisko}', [PublicZjawiskoController::class, 'show'])->name('publiczjawiska.show');

Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
Route::get('/forum/kategoria/{id}', [ForumController::class, 'showKategoria'])->name('forum.kategoria');
Route::get('/forum/watek/{id}', [ForumController::class, 'showWatek'])->name('forum.watek');
Route::post('/forum/kategoria/{id}/watek', [ForumController::class, 'storeWatek'])->name('forum.watek.store');
Route::post('/forum/watek/{id}/post', [ForumController::class, 'storePost'])->name('forum.post.store');
Route::post('/forum/post/{id}/komentarz', [ForumController::class, 'storeKomentarz'])->name('forum.komentarz.store');

Route::delete('/forum/komentarz/{id}', [ForumController::class, 'deleteKomentarz'])->name('forum.komentarz.delete');
Route::post('/forum/komentarz/{id}/edit', [ForumController::class, 'editKomentarz'])->name('forum.komentarz.edit');
