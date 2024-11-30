<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate([
            'email' => 'admin@mail.com'
        ], [
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin'),
            'team_member' => 1
        ]);
    }
}
