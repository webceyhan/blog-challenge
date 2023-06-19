<?php

namespace App\Controllers;

use App\Models\User;

class AuthController
{
    public function show()
    {
        // redirect to home if user is logged in
        auth() && redirect('/');

        return view('login');
    }

    public function store()
    {
        // fetch email and password from $_POST
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        // try to find user by email
        $user = User::findByEmail($email);

        // check if user exists and password is correct
        if (!$user || !password_verify($password, $user['password'])) {
            return view('login', [
                'error' => 'Wrong user or password'
            ]);
        }

        // set user in session
        app()->session->set('auth', $user);

        redirect('/');
    }

    public function destroy()
    {
        // remove user from session
        app()->session->remove('auth');

        redirect('/');
    }
}
