<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use SolutionForest\FilamentTranslateField\Facades\FilamentTranslateField;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();
        Model::shouldBeStrict();

        $supportedLocales = cache('supported_locales')->pluck('code')->map(fn ($val) => strtolower($val))->toArray();
        FilamentTranslateField::defaultLocales($supportedLocales);
    }
}
