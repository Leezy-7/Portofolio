<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\AdminUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Create test user (if not exists)
        if (!User::where('email', 'test@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
        }

        // Create admin user (if not exists)
        if (!AdminUser::where('username', 'admin')->exists()) {
            AdminUser::create([
                'username' => 'admin',
                'password' => Hash::make('admin123'),
                'is_active' => true,
            ]);
        }
    }
}
