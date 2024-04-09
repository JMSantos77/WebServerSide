<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function allUsers()
    {
        $allUsers = $this->getUsers();
        return view('users.all_users', compact('allUsers'));
    }

    public function helloName($name)
    {
        return ('<h2>Olá ' . $name . '</h2>');
    }

    // ** Métodos **
    protected function getUsers()
    {
        $users = [
            ['id' => 1, 'name' => 'Ana', 'phone' => 911111111],
            ['id' => 2, 'name' => 'Miguel', 'phone' => 911111112],
            ['id' => 3, 'name' => 'João', 'phone' => 911111113],
            ['id' => 4, 'name' => 'Maria', 'phone' => 911111114],
        ];

        return $users;
    }
}
