<?php

namespace App\Http\Controllers;

use App\Post\PostCollector;
use Illuminate\View\View;

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
     */
    public function index(): View
    {
        dd(PostCollector::all());

        return view('home');
    }
}
