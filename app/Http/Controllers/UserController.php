<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function allUsers()
    {
        $allUsers = $this->getUsers();

        $delegadoTurma = DB::table('users')->where('name', 'Toni')->first();

        return view('users.all_users', compact('allUsers', 'delegadoTurma'));
    }

    protected function getUsers()
    {

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
    public function viewUser($id)
    {
        $user = DB::table('users')
            ->where('id', $id)
            ->first();

            //dd($user);

        return view('users.user_view', compact('user'));
    }

    public function deleteUser($id)
    {
        //DB::table('tasks')->where('user_Id', $id)->delete(); //Se quisermos apagar alguém que tem task, primeiro temos de apagar a task
        DB::table('users')->where('id', $id)->delete();

        return redirect() ->back();
    }


    public function addUser()
    {
        DB::table('users')
            ->insert([
                'name' => 'Xana',
                'email' => 'eee@aaa.com',
                'password' => '234aaa'
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

    public function createUser(Request $request){


        $request->validate([
            'name'=>'string|max:50',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5'
        ]);

        User::insert([
            'name'=> $request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password),
        ]);

        //return redirect()->route('users.create')->with('message','Adicionado com Sucesso');
        return redirect()->back()->with('message','Adicionado com Sucesso');
    }
}
