<?php

namespace Database\Seeders;

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

        $user = User::firstOrCreate([
            'email' => 'admin@mail.com',
        ], [
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin'),
            'team_member' => 1,
        ]);

        $user->roles()->sync([1]);
    }
}
