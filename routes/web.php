<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;

Route::get('/', [PortofolioController::class, 'index']);
Route::get('/portfolio', [PortofolioController::class, 'index']);

// Admin Authentication Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
});

// Protected Admin Routes
Route::prefix('admin')->name('admin.')->middleware('admin.auth')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // About Management
    Route::get('/about', [AdminController::class, 'aboutIndex'])->name('about.index');
    Route::post('/about', [AdminController::class, 'aboutStore'])->name('about.store');
    
    // Experience Management
    Route::get('/experience', [AdminController::class, 'experienceIndex'])->name('experience.index');
    Route::get('/experience/create', [AdminController::class, 'experienceCreate'])->name('experience.create');
    Route::post('/experience', [AdminController::class, 'experienceStore'])->name('experience.store');
    Route::get('/experience/{experience}/edit', [AdminController::class, 'experienceEdit'])->name('experience.edit');
    Route::put('/experience/{experience}', [AdminController::class, 'experienceUpdate'])->name('experience.update');
    Route::delete('/experience/{experience}', [AdminController::class, 'experienceDestroy'])->name('experience.destroy');
    
    // Project Management
    Route::get('/project', [AdminController::class, 'projectIndex'])->name('project.index');
    Route::get('/project/create', [AdminController::class, 'projectCreate'])->name('project.create');
    Route::post('/project', [AdminController::class, 'projectStore'])->name('project.store');
    Route::get('/project/{project}/edit', [AdminController::class, 'projectEdit'])->name('project.edit');
    Route::put('/project/{project}', [AdminController::class, 'projectUpdate'])->name('project.update');
    Route::delete('/project/{project}', [AdminController::class, 'projectDestroy'])->name('project.destroy');
    
    // Contact Management
    Route::get('/contact', [AdminController::class, 'contactIndex'])->name('contact.index');
    Route::post('/contact', [AdminController::class, 'contactStore'])->name('contact.store');
    
    // Social Links Management
    Route::get('/social', [AdminController::class, 'socialIndex'])->name('social.index');
    Route::post('/social', [AdminController::class, 'socialStore'])->name('social.store');
    Route::put('/social/{socialLink}', [AdminController::class, 'socialUpdate'])->name('social.update');
    Route::delete('/social/{socialLink}', [AdminController::class, 'socialDestroy'])->name('social.destroy');
});
