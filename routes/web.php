<?php

use App\Http\Controllers\Admin\Auth\{LoginAdminController, LogoutAdminController};
use App\Http\Controllers\Admin\{DashboardController, JadwalAdminController, PasienAdminController, PricingController, ProfileAdminController, PsychologAdminController, PsychologicalTestResultAdminController, QuestionAdminController, TransaksiAdminController};
use App\Http\Controllers\KonselingChatController;
use App\Http\Controllers\Payment\TripayController;
use App\Http\Controllers\User\Auth\{LoginController, LogoutController, RegisterController};
use App\Http\Controllers\User\{DashboardUserController, JadwalUserController, ProfileUserController, PsychologUserController, TransactionUserController};
use App\Http\Controllers\WelcomeController;
use App\Http\Middleware\{GusetAdminMiddleware, GusetUserMiddleware, KonselingChatMiddleware, SessionAdminLoginMiddleware, SessionUserLoginMiddleware};
use Illuminate\Support\Facades\Route;


// ========> Admin Route <=========
Route::middleware(GusetAdminMiddleware::class)->group(function () {
    Route::get('admin/login', [LoginAdminController::class, 'login'])->name('admin.login');
    Route::post('admin/login', [LoginAdminController::class, 'authenticate']);
});

Route::prefix('admin')->middleware(SessionAdminLoginMiddleware::class)->as('admin.')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::prefix('psycholog')->as('psycholog.')->group(function () {
        Route::get('/', [PsychologAdminController::class, 'index'])->name('index');
        Route::post('store', [PsychologAdminController::class, 'store'])->name('store');
        Route::put('{psycholog}/update', [PsychologAdminController::class, 'update'])->name('update');
        Route::put('{psycholog}/status', [PsychologAdminController::class, 'status'])->name('status');

        Route::prefix('{psycholog}/question')->as('question.')->group(function () {
            Route::get('/', [QuestionAdminController::class, 'index'])->name('index');
            Route::get('create', [QuestionAdminController::class, 'create'])->name('create');
            Route::post('store', [QuestionAdminController::class, 'store'])->name('store');
            Route::get('{question}/edit', [QuestionAdminController::class, 'edit'])->name('edit');
            Route::put('{question}/update', [QuestionAdminController::class, 'update'])->name('update');
            Route::delete('{question}/delete', [QuestionAdminController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('{psycholog}/result')->as('result.')->group(function () {
            Route::get('/', [PsychologicalTestResultAdminController::class, 'index'])->name('index');
            Route::post('store', [PsychologicalTestResultAdminController::class, 'store'])->name('store');
        });
    });
    Route::prefix('transaksi')->as('transaksi.')->group(function () {
        Route::get('/', [TransaksiAdminController::class, 'index'])->name('index');
        Route::get('{reference}/detail', [TransaksiAdminController::class, 'show'])->name('show');
    });
    Route::prefix('pasien')->as('pasien.')->group(function () {
        Route::get('/', [PasienAdminController::class, 'index'])->name('index');
        Route::post('store', [PasienAdminController::class, 'store'])->name('store');
        Route::put('{user}/update-password', [PasienAdminController::class, 'update'])->name('update');
        Route::delete('{user}/delete', [PasienAdminController::class, 'destroy'])->name('destroy');
    });
    Route::prefix('konsultasi')->as('konsultasi.')->group(function () {
        Route::get('/', [JadwalAdminController::class, 'index'])->name('index');
        Route::post('{schedule}/store', [JadwalAdminController::class, 'store'])->name('store');
        Route::post('{schedule}/finish', [JadwalAdminController::class, 'finish'])->name('finish');
    });
    Route::prefix('pricing')->as('pricing.')->group(function () {
        Route::get('/', [PricingController::class, 'index'])->name('index');
        Route::post('store', [PricingController::class, 'store'])->name('store');
        Route::put('{pricing}/update', [PricingController::class, 'update'])->name('update');
        Route::put('{pricing}/change-status', [PricingController::class, 'destroy'])->name('destroy');
    });
    Route::prefix('pengaturan')->as('pengaturan.')->group(function () {
        Route::prefix('profil')->as('profil.')->group(function () {
            Route::get('/', [ProfileAdminController::class, 'index'])->name('index');
            Route::post('store', [ProfileAdminController::class, 'store'])->name('store');
            Route::post('account', [ProfileAdminController::class, 'setAccount'])->name('account');
        });
    });
    Route::post('logout', LogoutAdminController::class)->name('logout');
});

// ========> Route Client No Auth <============
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('psycholog/{psycholog}', [WelcomeController::class, 'psycholog'])->name('psikologi.index');
Route::get('psycholog/{psycholog}/question', [WelcomeController::class, 'show'])->name('psikologi.show');
Route::post('{psycholog}/store', [WelcomeController::class, 'store'])->name('tes');


// ========> Route User Login <===========
Route::middleware(GusetUserMiddleware::class)->group(function () {
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate']);
    Route::get('register', [RegisterController::class, 'register'])->name('register');
    Route::post('register', [RegisterController::class, 'register_process']);
});

Route::prefix('user')->as('user.')->middleware(SessionUserLoginMiddleware::class)->group(function () {
    Route::get('/', DashboardUserController::class)->name('dashboard');
    Route::post('logout', LogoutController::class)->name('logout');

    Route::prefix('psycholog')->as('psycholog.')->group(function () {
        Route::get('/', [PsychologUserController::class, 'index'])->name('index');
        Route::get('{psycholog}/detail', [PsychologUserController::class, 'show'])->name('show');
        Route::get('{psycholog}/{psycholog_user}/checkout', [PsychologUserController::class, 'checkout'])->name('checkout');
    });
    Route::prefix('konseling')->as('konseling.')->group(function () {
        Route::get('/', [JadwalUserController::class, 'index'])->name('index');
        Route::get('{pricing}/create', [JadwalUserController::class, 'create'])->name('create');
        Route::post('{pricing}/store', [JadwalUserController::class, 'store'])->name('store');
        Route::get('{schedule}/checkout', [JadwalUserController::class, 'checkout'])->name('checkout');
        Route::post('{schedule}/cancel', [JadwalUserController::class, 'cancel'])->name('cancel');
    });
    Route::prefix('transaksi')->as('transaksi.')->group(function () {
        Route::get('/', [TransactionUserController::class, 'index'])->name('index');
        Route::post('{psycholog_user}/psycholog/store', [TransactionUserController::class, 'storePsycholog'])->name('psycholog.store');
        Route::post('{schedule}/schedule/store', [TransactionUserController::class, 'storeSchedule'])->name('schedule.store');
        Route::get('{reference}/show', [TransactionUserController::class, 'show'])->name('show');
        Route::get('{reference}/detail', [TransactionUserController::class, 'detail'])->name('detail');
    });
    Route::prefix('pengaturan')->as('pengaturan.')->group(function () {
        Route::prefix('profil')->as('profil.')->group(function () {
            Route::get('/', [ProfileUserController::class, 'index'])->name('index');
            Route::post('store', [ProfileUserController::class, 'store'])->name('store');
            Route::post('account', [ProfileUserController::class, 'setAccount'])->name('account');
        });
    });
});
Route::post('charge', [TripayController::class, 'handle'])->name('charge');

Route::prefix('chat')->middleware('lock')->group(function () {
    Route::get('{schedule}/read', [KonselingChatController::class, 'index'])->name('chat.index');
    Route::post('{schedule}/store', [KonselingChatController::class, 'store'])->name('chat.store');
    Route::get('{schedule}', [KonselingChatController::class, 'chat'])->name('chat');
});
