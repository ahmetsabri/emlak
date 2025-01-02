<?php

use App\Models\ExchangeRate;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

use function Laravel\Prompts\info;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();
Artisan::command('exchange-rate', function () {
    $data = json_decode(file_get_contents(config('services.exchange_rate.url')), 1)['try'];

    ExchangeRate::firstOrCreate([
        'date' => now()->toDateString(),
    ], [
        'usd' => 1 / $data['usd'],
        'eur' => 1 / $data['eur'],
        'gbp' => 1 / $data['gbp'],
    ]);

    info('Done');
})->purpose('Display an inspiring quote')->hourly();
