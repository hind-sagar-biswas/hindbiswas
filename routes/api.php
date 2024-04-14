<?php

use App\Http\Controllers\PortfolioDataApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/skill/all', [PortfolioDataApiController::class, 'skills'])->name('api.skill.all');
Route::prefix('learnable')->name('api.learnable.')->group(function() {
    Route::get('/all', [PortfolioDataApiController::class, 'learnables'])->name('all');
    Route::get('/group/{group}', [PortfolioDataApiController::class, 'learnablesByGroup'])->name('group');
    Route::get('/{learnable}', [PortfolioDataApiController::class, 'learnable'])->name('get');
});
Route::prefix('project')->name('api.project.')->group(function() {
    Route::get('/all', [PortfolioDataApiController::class, 'projects'])->name('all');
    Route::get('/{project}', [PortfolioDataApiController::class, 'project'])->name('get');
});