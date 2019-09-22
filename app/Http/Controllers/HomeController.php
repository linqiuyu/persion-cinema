<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovie;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Qiniu\Auth;

class HomeController extends Controller
{
    /**
     * Index page.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $movies = Movie::orderBy('id', 'desc')->take(9)->get();
        return view('home.index', [
            'movies' => $movies,
            'path' => $request->path(),
        ]);
    }

    /**
     * Craete page.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        $qiniu = new Auth(
            config('filesystems.disks.qiniu.access_key'),
            config('filesystems.disks.qiniu.secret_key')
        );
        return view('home.create', [
            'path' => $request->path(),
            'qiniu' => $qiniu,
        ]);
    }

    public function store(StoreMovie $request)
    {
        $movie = Movie::create($request->all());
        return $movie;
    }

    /**
     * About page.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about(Request $request)
    {
        return view('home.about', [
            'path' => $request->path(),
        ]);
    }

    /**
     * Video play page.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function player(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        return view('home.player', [
            'path' => $request->path(),
            'movie' => $movie
        ]);
    }
}
