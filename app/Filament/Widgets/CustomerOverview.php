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
        $totalDoneTodo = Todo::where('status', TodoStatus::DONE)->count();

        return [
            Stat::make(__('Customer Count'), $totalCustomer)
                ->icon('heroicon-m-user'),
            Stat::make(__('Todo Count'), $totalTodo)
                ->icon('heroicon-m-list-bullet'),
            Stat::make(__('Completed Todo Count'), $totalDoneTodo)
                ->icon('heroicon-s-check'),

        ];
    }

    public function getHeading(): string|null
    {
        return '';
    }
}
