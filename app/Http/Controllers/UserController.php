<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showHome() // Renamed method to be more descriptive
    {
        $card = Card::all();
        $name = session('name');
        return view('Home.index', [
            'name' => $name,
            'cards' => $card
        ]);
    }

    public function showDesignPage() // Renamed method to be more descriptive
    {
        $card = Card::all();

        $name = session('name');
        return view('Home.design', [
            'name' => $name,
            'cards' => $card
        ]);
    }

    public function showSettings() // Renamed method to be more descriptive
    {
        return view('Home.setting');
    }
}
