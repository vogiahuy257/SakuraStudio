<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username' => 'giahuy', 
            'password' => Hash::make('22042004'),
            'name' => 'Admin Heo', 
            'role' => 'admin', 
            'email' => 'user1@example.com', 
            'phone' => '1234567890', 
        ];
    }
}
