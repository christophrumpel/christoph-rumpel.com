<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Post\PostCollector;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        dd(PostCollector::all());

        return view('home');
    }
}
