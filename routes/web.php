<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;





Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('leads', [LeadController::class, 'index'])->name('leads.index');
    Route::resource('leads', LeadController::class);
});

Route::middleware('guest')->group(function () {
    Route::get('register', [UserController::class, 'create'])->name('register');
    Route::post('register', [UserController::class, 'store'])->name('user.store');
    Route::get('login', [UserController::class, 'login'])->name('login');
    Route::post('login', [UserController::class, 'authenticate'])->name('login.auth');
    Route::get('forgot-password', function () {
        return view('user.forgot-password');
    })->middleware('guest')->name('password.request');
    Route::post('forgot-password', [UserController::class, 'forgot'])->name('password.email')->middleware('throttle:2,1');
    Route::get('reset-password/{token}', function (string $token) {
        return view('user.reset-password', ['token' => $token]);
    })->name('password.reset');
    Route::post('reset-password', [UserController::class, 'reset'])->name('password.update');
    Route::get('/', function () {
        return view('welcome');
    })->name('home');
});


Route::middleware('auth')->group(function () {
    Route::get('verify-email', function () {
        return view('user.verify-email');
    })->name('verification.notice');
    
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
     
        return back()->with('message', 'Ссылка для верификации отправлена');
    })->middleware('throttle:2,1')->name('verification.send');
    
     
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect()->route('leads.index');
    })->middleware('signed')->name('verification.verify');

    Route::get('logout', [UserController::class, 'logout'])->name('logout');
});
