<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
    Route::resource('periodes', PeriodeController::class);
    Route::get('/print/{id}',[PeriodeController::class, 'print'])->name('periodes.print');
    Route::resource('transactions', TransactionController::class);
    Route::resource('category',CategoryController::class);
    Route::resource('assets', AssetController::class);
    Route::get('/setting', [SettingController::class,'index']);
    Route::post('/setting', [SettingController::class,'update'])->name('setting.update');
    

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
