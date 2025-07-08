<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\TrixAttachmentController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('front.index'); 
Route::get('/program', [FrontController::class, 'program'])->name('front.program'); 
Route::get('/about', [FrontController::class, 'about'])->name('front.about'); 
Route::get('/team', [FrontController::class, 'team'])->name('front.team'); 
Route::get('/artikel', [FrontController::class, 'artikel'])->name('front.artikel'); 
Route::get('/material', [FrontController::class, 'material'])->name('front.material');
Route::get('/report', [FrontController::class, 'report'])->name('front.report');
Route::get('/artikel/{artikel:slug}', [FrontController::class, 'artikel_detail'])->name('artikel.detail');
Route::get('/program/{program:id}', [FrontController::class, 'program_detail'])->name('program.detail');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');
    

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::middleware('can:manage hero_sections')->group(function () {
            Route::resource('hero_sections', HeroSectionController::class);
        });
        Route::middleware('can:manage programs')->group(function () {
            Route::resource('programs', ProgramController::class);
        });
        Route::middleware('can:manage artikels')->group(function () {
            Route::resource('artikels', ArtikelController::class);
        });
        Route::middleware('can:manage materials')->group(function () {
            Route::resource('materials', MaterialController::class);
        });
        Route::middleware('can:manage reports')->group(function () {
            Route::resource('reports', ReportController::class);
        });
        Route::middleware('can:manage users')->group(function () {
            Route::resource('users', UserController::class);
        });
        Route::middleware('can:manage roles')->group(function () {
            Route::resource('roles', RoleController::class);
        });
        Route::middleware('can:manage abouts')->group(function () {
            Route::resource('abouts', AboutController::class);
        });
        Route::middleware('can:manage teams')->group(function () {
            Route::resource('teams', TeamController::class);
        });
        Route::post('/trix-attachments', [TrixAttachmentController::class, 'store'])->name('trix.attachments.store');
        // Route khusus untuk menghapus upload dari Trix Editor
        Route::delete('/trix-attachments', [TrixAttachmentController::class, 'destroy'])->name('trix.attachments.destroy');

    });
});

require __DIR__.'/auth.php';
