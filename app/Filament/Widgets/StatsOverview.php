<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;

class StatsOverview extends BaseWidget
{
    protected ?string $heading = 'Döviz';

    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $exchangeRate = cache('exchange:rate');
        $this->description = 'Son güncelleme : '.$exchangeRate->date;

        return [
            Stat::make('USD', Number::format($exchangeRate->usd, 2).'₺')
                ->icon('heroicon-m-currency-dollar'),
            Stat::make('EUR', Number::format($exchangeRate->eur, 2).'₺')
                ->icon('heroicon-m-currency-euro')
                ->color('array{50: string, 100: string, 200}'),
            Stat::make('GBP', Number::format($exchangeRate->gbp, 2).'₺')
                ->icon('heroicon-m-currency-pound')
                ->color('danger'),

        ];
    }
}
