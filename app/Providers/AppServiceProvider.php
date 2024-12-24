<?php

namespace App\Providers;

use App\Models\Language;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Number;
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
        Number::useLocale('tr');
        Model::unguard();
        Model::shouldBeStrict();

        \Livewire\Livewire::forceAssetInjection();

        if (! app()->runningInConsole()) {
            $supportedLocales = cache('supported_locales') ?: cache()->rememberForever('supported_locales', fn () => Language::where('is_active', true)->get());
            $supportedLocales = cache('supported_locales')?->pluck('code')->map(fn ($val) => strtolower($val))->toArray();
            FilamentTranslateField::defaultLocales($supportedLocales);
        }

        if (app()->isProduction()) {
            URL::forceScheme('https');
        }

        Gate::before(function (User $user, string $ability) {
            return $user->isSuperAdmin() ? true : null;
        });
    }
}
