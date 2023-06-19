<?php

namespace App\Controllers;

use App\Models\User;

class AuthorController
{
    public function __construct()
    {
        // redirect to login page if user is not logged in
        auth()->id || redirect('/login');
    }

    public function index()
    {
        $users = User::all();

        return view('authors/index', [
            'users' => $users
        ]);
    }
}
