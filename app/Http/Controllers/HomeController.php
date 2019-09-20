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
    public function index(Request $request) {
        $movies = Movie::take(10)->get();
        return view('home.index', [
            'movies' => $movies,
            'path' => $request->path(),
        ]);
    }

    public function create() {
        return view('home.create');
    }

    public function store(Request $request) {
        $movie = Movie::create($request->all());
        return $movie;
    }
}
