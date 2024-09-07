<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Create admin users
        User::create([
            'username' => 'giahuy',
            'password' => Hash::make('22042004'), // Mã hóa mật khẩu
            'name' => 'Heo',
            'role' => 'admin',
            'email' => 'user1@example.com',
            'phone' => '1234567890',
        ]);

        User::create([
            'username' => 'baotran',
            'password' => Hash::make('300804'), // Mã hóa mật khẩu
            'name' => 'chesse',
            'role' => 'admin',
            'email' => 'user2@example.com',
            'phone' => '0987654321',
        ]);

        User::create([
            'username' => 'hoangtri',
            'password' => Hash::make('1234567'), // Mã hóa mật khẩu
            'name' => 'tri',
            'role' => 'admin',
            'email' => 'user3@example.com',
            'phone' => '0987654321',
        ]);
    }
}
