<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('home.index', [
            'list' => [1, 2, 3, 4, 5]
        ]);
    }
}
