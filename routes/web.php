<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Chat\Chat;
use App\Livewire\Chat\Index;
use App\Livewire\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PsikologController;
use App\Http\Controllers\KonselingController;
use App\Http\Controllers\LandingController;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Konseling;
use App\Livewire\Admin\Psikolog as AdminPsikolog;
use App\Livewire\Admin\Users as AdminUsers;
use App\Livewire\Landing\Psikolog;
use App\Livewire\Landing\Riwayat;
use Barryvdh\DomPDF\Facade\Pdf;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LandingController::class, 'index'])->name('landing');


Route::get('/landing-psikolog', Psikolog::class)->name('landing-psikolog');

Route::get('/landing-riwayat', Riwayat::class)->name('landing-riwayat');


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/chat', Index::class)->name('chat.index');
    Route::get('/chat/{query}',  Chat::class)->name('chat');
    Route::get('/users',  Users::class)->name('users');

    Route::get('/booking/{id}', [KonselingController::class, 'create'])->name('booking');
    Route::post('/booking-store/{id}', [KonselingController::class, 'store'])->name('booking-store');
    Route::get('/cetak-hasil/{id}', [KonselingController::class, 'cetakHasil'])->name('cetak-hasil');

    // Admin routes
    Route::middleware('role:admin')->prefix('admin')->group(function(){
        Route::get('/', Dashboard::class)->name('admin.dashboard');
        Route::get('/users', AdminUsers::class)->name('admin.users');
        Route::get('/psikolog', AdminPsikolog::class)->name('admin.psikolog');
        Route::get('/konseling', Konseling::class)->name('admin.konseling');

    });
});

require __DIR__ . '/auth.php';
