<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
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
     * @return Renderable
     */
    public function index(): Renderable
    {
        $user = request()->user();
        return view('home', compact('user'));
    }

    public function users()
    {
        $user = request()->user();
        $users = User::query()
            ->whereNotIn('id', [$user->id])
            ->get();
        return view('users.index', compact('users'));
    }
}
