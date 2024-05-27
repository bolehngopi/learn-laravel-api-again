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
        User::truncate();
        User::factory()->create([
            'username' => 'admin1',
            'password' => 'admin1',
            'isAdmin' => true
        ]);

        User::factory()->create([
            'username' => 'user1',
            'password' => 'user1'
        ]);
    }
}
