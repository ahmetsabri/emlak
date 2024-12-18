<?php

namespace App\Filament\Widgets;

use App\Models\Customer;
use App\Models\Todo;
use App\TodoStatus;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CustomerOverview extends BaseWidget
{
    protected static ?int $sort = 3;

    protected function getStats(): array
    {
        $totalCustomer = Customer::count();
        $totalTodo = Todo::where('status', TodoStatus::DOING)->count();
        $totalDoneTodo = Todo::where('status', TodoStatus::Done)->count();
        return [
                    Stat::make('Müşteri Sayısı', $totalCustomer)
                ->icon('heroicon-m-user'),
                    Stat::make('Görevler Sayısı', $totalTodo)
                ->icon('heroicon-m-list-bullet'),
                    Stat::make('Tamamlanmış Görevler Sayısı', $totalDoneTodo)
                ->icon('heroicon-s-check'),

        ];
    }
}
