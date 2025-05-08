<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create primary admin
        User::create([
            'name' => 'System Admin',
            'email' => 'adminsys@fgo.net',
            'password' => Hash::make('Admin@123'),
            'access_level' => 9,
        ]);

        // Create secondary admin
        User::create([
            'name' => 'Assistant Admin',
            'email' => 'adminassist@fgo.net',
            'password' => Hash::make('Admin@123'),
            'access_level' => 9,
        ]);
    }
} 