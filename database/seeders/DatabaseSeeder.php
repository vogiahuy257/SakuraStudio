<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Create admin users
        User::create([
            'username' => 'giahuy',
            'password' => Hash::make('22042004'),
            'name' => 'Heo',
            'role' => 'admin',
            'email' => 'user1@example.com',
            'phone' => '1234567890',
        ]);

        User::create([
            'username' => 'baotran',
            'password' => Hash::make('300804'),
            'name' => 'chesse',
            'role' => 'admin',
            'email' => 'user2@example.com',
            'phone' => '0987654321',
        ]);

        User::create([
            'username' => 'hoangtri',
            'password' => Hash::make('1234567'),
            'name' => 'tri',
            'role' => 'admin',
            'email' => 'user3@example.com',
            'phone' => '0987654321',
        ]);

        User::create([
            'username' => 'test1',
            'password' => Hash::make('12345678'),
            'name' => 'Demo',
            'role' => 'user',
            'email' => 'user4@example.com',
            'phone' => '0987654321',
        ]);
    }
}
