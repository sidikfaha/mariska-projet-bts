<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function create(): Factory|View|Application
    {
        return view('users.ajouter');
    }

    public function store(Request $request): RedirectResponse
    {
        $attrs = $request->except('_token');
        $attrs['password'] = Hash::make($attrs['password']);
        $user = User::query()->create($attrs);
        $user->save();
        Session::flash('created');
        return back();
    }
}
