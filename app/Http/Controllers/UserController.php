<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showHome() // Renamed method to be more descriptive
    {
        $name = session('name');
        return view('Home.index', [
            'name' => $name
        ]);
    }

    public function showDesignPage() // Renamed method to be more descriptive
    {
        $name = session('name');
        return view('Home.design', [
            'name' => $name
        ]);
    }

    public function showSettings() // Renamed method to be more descriptive
    {
        return view('Home.setting');
    }
}
