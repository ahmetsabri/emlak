<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::group([''], function () {

    Route::post('/portfolio-form', [FormController::class, 'storePortfolioForm'])->name('form.portfolio');
    Route::post('/portfolio-form', [FormController::class, 'storeJobForm'])->name('form.job');

    Route::post('contact-form', [FormController::class, 'storeContactForm'])->name('form.contact');

    Route::get('/', [PagesController::class, 'home'])->name('home');
    Route::get('team', [PagesController::class, 'team'])->name('frontend.team.index');
    Route::get('team/{user}', [PagesController::class, 'showTeam'])->name('frontend.user.show');
    Route::get('portfolios', [PagesController::class, 'portfolios'])->name('portfolios');
    Route::get('portfolios/{portfolio:slug}', [PagesController::class, 'showPortfolio'])->name('frontend.portfolio.show');
    // Route::get('team/{user}', [PagesController::class, 'showTeam'])->name('frontend.portfolio.show');
    Route::get('contact', [PagesController::class, 'contact'])->name('contact');
    Route::get('videos', [PagesController::class, 'videos'])->name('videos');
    Route::get('blogx', [PagesController::class, 'blog'])->name('frontend.about');
    Route::get('blogxx', [PagesController::class, 'blog'])->name('frontend.services');
    Route::get('blogxx', [PagesController::class, 'blog'])->name('frontend.services');
    Route::get('blogxwx', [PagesController::class, 'blog'])->name('frontend.blog2');
    Route::get('blogxwwx', [PagesController::class, 'blog'])->name('buy_sell');
    Route::get('blogxwawx', [PagesController::class, 'blog'])->name('career');
    Route::get('blogxwawx', [PagesController::class, 'blog'])->name('career');
    Route::get('blogxsx', [PagesController::class, 'blog'])->name('projects');
    Route::get('ss', [PagesController::class, 'blog'])->name('frontend.faq');

    Route::get('locamag', [PagesController::class, 'blog'])->name('frontend.blog');
    Route::get('locamag/{post:slug}', [PagesController::class, 'showPost'])->name('frontend.post.show');

    Route::post('comment', [CommentController::class, 'store'])->name('comment.store');
    Route::get('comment/{user}', [CommentController::class, 'show'])->name('user.comments');


});

Route::get('locale/{locale}', function ($locale) {
    app()->setLocale($locale);

    return back();
})->name('locale');

Route::get('localex/{locale}', function ($locale) {
    app()->setLocale($locale);

    return back();
})->name('currency');

Route::get('towns/{province?}', [CountryController::class, 'towns'])->name('province.towns');
Route::get('districts/{town?}', [CountryController::class, 'districts'])->name('towns.districts');
