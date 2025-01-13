<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::name('pages.')->group(function () {
    Route::get('/', [PagesController::class, 'home'])->name('home');
    Route::get('team', [PagesController::class, 'team'])->name('team');
    Route::get('team/{user}', [PagesController::class, 'showTeam'])->name('team.show');
    Route::get('contact', [PagesController::class, 'contact'])->name('contact');
    Route::get('portfolio', [PagesController::class, 'portfolios'])->name('portfolio');
    Route::get('blog', [PagesController::class, 'blog'])->name('blog');
});

Route::get('locale/{locale}', function ($locale) {
    app()->setLocale($locale);
    return back();
})->name('locale.change');
