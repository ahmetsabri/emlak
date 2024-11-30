<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Language::firstOrCreate(['code'=>'TR'],[
            'name' => 'Türkçe',
            'code' => 'TR',
        ]);
        Language::firstOrCreate(['code'=>'EN'],[
            'name' => 'İnglizce',
            'code' => 'EN',
        ]);
    }
}
