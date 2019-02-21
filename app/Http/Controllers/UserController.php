<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function index()
    {
        $users = \App\User::all();

        return view('users', [
            'users' => $users
        ]);
    }

    function show($id)
    {
        $user = \App\User::where('id', $id)->get()->first();

        \Carbon\Carbon::setLocale('fr');
        $date_to_show = $user->created_at->diffForHumans();

        return view('user', [
            'user' => $user,
            'date_to_show' => $date_to_show
        ]);
    }
}
