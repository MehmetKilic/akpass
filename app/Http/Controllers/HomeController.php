<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Password;
use Illuminate\Http\Request;

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
    public function index()
    {
        $allCategory = Category::where('status', 1)->get();
        $allPassword = Password::paginate(15);

        return view('home', [
            'categories' => $allCategory,
            'passwords'  => $allPassword
        ]);
    }
}
