<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DifficultiesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipesController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/recipes', [RecipesController::class, 'store'])->name('recipes.store');
    Route::get('/recipes/create', [RecipesController::class, 'create'])->name('recipes.create');
    Route::get('/recipes/{id}/edit', [RecipesController::class, 'edit'])->name('recipes.edit');
    Route::put('/recipes/{id}', [RecipesController::class, 'update'])->name('recipes.update');
    Route::delete('/recipes/{id}', [RecipesController::class, 'destroy'])->name('recipes.destroy');

    Route::post('/categories', [CategoriesController::class, 'store'])->name('categories.store');
    Route::get('/categories/create', [CategoriesController::class, 'create'])->name('categories.create');
    Route::get('/categories/{id}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{id}', [CategoriesController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoriesController::class, 'destroy'])->name('categories.destroy');

    Route::post('/difficulties', [DifficultiesController::class, 'store'])->name('difficulties.store');
    Route::get('/difficulties/create', [DifficultiesController::class, 'create'])->name('difficulties.create');
    Route::get('/difficulties/{id}/edit', [DifficultiesController::class, 'edit'])->name('difficulties.edit');
    Route::put('/difficulties/{id}', [DifficultiesController::class, 'update'])->name('difficulties.update');
    Route::delete('/difficulties/{id}', [DifficultiesController::class, 'destroy'])->name('difficulties.destroy');
});

require __DIR__.'/auth.php';

Route::get('/difficulties', [DifficultiesController::class, 'index'])->name('difficulties.index');
Route::get('/difficulties/{id}', [DifficultiesController::class, 'show'])->name('difficulties.show');

Route::get('/recipes', [RecipesController::class, 'index'])->name('recipes.index');
Route::get('/recipes/{id}', [RecipesController::class, 'show'])->name('recipes.show');

Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index');
Route::get('/categories/{id}', [CategoriesController::class, 'show'])->name('categories.show');

