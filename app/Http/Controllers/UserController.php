<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function allUsers()
    {
        return view('users.all_users');
    }

    public function helloName($name)
    {
        return ('<h2>Olá ' . $name . '</h2>');
    }
}
