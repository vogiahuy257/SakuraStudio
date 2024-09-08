<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Card;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Card::create([
            'image_path' => '/image/canvas/Canvas1.svg',
            'title' => '1. Thank You!',
            'description' => 'This is a template for you to download the Excel file from your computer and create simple cards for everyone.',
            'last_updated' => '3 mins ago',
        ]);

        Card::create([
            'image_path' => '/image/canvas/Canvas2.svg',
            'title' => '2. Thank You!',
            'description' => 'This is a template for you to download the Excel file from your computer and create simple cards for everyone.',
            'last_updated' => '3 mins ago',
        ]);

        Card::create([
            'image_path' => '/image/canvas/Canvas3.svg',
            'title' => '3. Thank You!',
            'description' => 'This is a template for you to download the Excel file from your computer and create simple cards for everyone.',
            'last_updated' => '3 mins ago',
        ]);
    }
}
