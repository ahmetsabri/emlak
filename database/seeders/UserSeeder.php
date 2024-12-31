<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Artisan::call('permissions:sync');
        Artisan::call('app:translate-permissions');
        $company = Company::factory()->create();
        $superAdmin = User::firstOrCreate([
            'email' => 'admin@mail.com',
            'company_id' => $company->id
        ], [
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin'),
            'team_member' => true,
        ]);

        $superAdmin->roles()->sync([1]);

        $admin = User::factory()->create([
            'email' => 'team@mail.com',
            'company_id' => $company->id,
            'team_member' => true,
            'password' => bcrypt('admin'),
        ]);
    }
}
