<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Questions\Entities\Question;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $questions = Question::with('user')->orderBy('created_at', 'desc')->paginate(5);
        $questions = Question::orderBy('created_at', 'desc')->paginate(5);

        // dd($questions);
        return view('layouts.frontend.index', compact('questions'));
    }
}
