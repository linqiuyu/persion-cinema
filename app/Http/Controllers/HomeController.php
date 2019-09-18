<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Index page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $movies = [];
        return view('home.index', [
            'movies' => $movies,
        ]);
    }

    public function add(Request $request) {
        $movie = Movie::create($request->all());
        return $movie;
    }
}
