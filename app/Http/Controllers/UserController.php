<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function allUsers(){
        $allUsers = $this->getUsers();

        $delegadoTurma = DB::table('users')->where('name','Toni')->first();

        return view('users.all_users', compact('allUsers', 'delegadoTurma'));
    }

    protected function getUsers(){

        $users = DB::table('users') //Vai buscar os dados à DB, tabela users
            ->get();

        return $users;

        //Para só retornar Miguel
        /*
        $users = DB::table('users') //Vai buscar os dados à DB, tabela users
            ->where('name', 'Miguel')
            ->get();

        return $users;*/
    }


    /*
    //getUsers() inicial. Comentado para ir buscar os dados à DB em vez de adicionar direto.

    protected function getUsers(){
        $users = [
            ['id' => 1, 'name' => 'Ana', 'phone' => 911111111],
            ['id' => 2, 'name' => 'Miguel', 'phone' => 911111112],
            ['id' => 3, 'name' => 'João', 'phone' => 911111113],
            ['id' => 4, 'name' => 'Maria', 'phone' => 911111114],
        ];
        return $users;
    }*/

    public function helloName($name)
    {
        return ('<h2>Olá ' . $name . '</h2>');
    }


    // ** Métodos **
    public function viewUser()
    {
        return view('users.user_view');
    }

    public function addUser()
    {
        DB::table('users')
            ->insert([
                'name' => 'Xana',
                'email' => 'eee@aaa.com',
                'password' => '234aaa'
            ]);

        DB::table('users')
            ->insert([
                'name' => 'Lena',
                'email' => 'fff@aaa.com',
                'password' => '2345aaa'
            ]);
    }

    /*
    public function updateUser(){
        DB::table('users')
            ->where('id', 1)
            ->update([
                'email_verified_at' => now()
            ]);
    }
    */

    //Ou então esta opção, que pode ser inserido tudo e faz update se já existir:
    public function updateUser()
    {
        DB::table('users')
            ->updateOrinsert(
                [
                    'email' => 'ccc@aaa.com' //If email = a ccc@aaa.com
                ],
                [
                    //'email_verified_at' => now()
                    'email' => 'testeUpdate@aaa.com' // Update para testeUpdate@aaa.com
                ]
            );
    }
}
