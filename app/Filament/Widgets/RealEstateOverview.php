<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\RealEstate;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\HtmlString;
use Number;

class RealEstateOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected ?string $heading = 'Gayrimenkul';

    protected function getStats(): array
    {
        $this->description = 'Gayrimenkul ';

        $realestate = RealEstate::count();
        $totalPrice = Number::format(RealEstate::sum('price'));
        $totalInUsd = Number::format($totalPrice / cache('exchange:rate')['usd']).'$';
        $totalInEur = Number::format($totalPrice / cache('exchange:rate')['eur']).'€';
        $category = Category::whereNull('parent_id')->count();

        return [
            Stat::make('Toplam Gayrimenkul Saysı', $realestate)
                ->icon('heroicon-m-home-modern'),
            Stat::make('Toplam Gayrimenkul Değeri', $totalPrice.'₺')
                ->description(new HtmlString($totalInUsd.'<br>'.$totalInEur))
                ->icon('heroicon-m-banknotes'),
            Stat::make('Toplam Kategori Saysı', $category)
                ->icon('heroicon-m-rectangle-group'),
        ];
    }
}
