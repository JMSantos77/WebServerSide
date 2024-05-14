<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function allUsers()
    {
        //Se quiser passar no controller o tipo
        //If profile is admin, vou buscar o tipo a User.php
        //$admin = User::TYPE_ADMIN;



        //$allUsers = $this->getUsers(); //Trocamos para query direta em baixo para pesquisar

        /* //Sem ternário
        $search = null;
        if(request()->query('search')){
            $search = request()->query('search');
        }else{
            $search == null;
        }
        */

        //Com ternário
        $search = request()->query('search') ? request()->query('search') : null;

        if ($search) {
            $allUsers = DB::table('users')
                ->where('name', "LIKE", "%{$search}%")
                ->orWhere('email', "LIKE", "%{$search}%")
                ->get();
        } else {
            $allUsers = DB::table('users')->get();
        }

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

        return redirect()->back();
    }

    /*
    public function addUser()
    {
        DB::table('users')
            ->insert([
                'name' => 'Xana',
                'email' => 'eee@aaa.com',
                'password' => '234aaa'
            ]);
    }
*/

    //Rota para retornar o register alterada e criada nova blade para criar novo user
    public function addUser()
    {
        return view('users.create_users');
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

    public function createUser(Request $request)
    {
        //Se for um update
        if (isset($request->id)) {
            //dd($request->photo);

            $photo=null;

            $request->validate([
                'name' => 'string|max:50',
                'address' => 'string',
                'cpostal' => 'string',
                //'photo' => 'image'
            ]);

            if($request->hasFile('photo')){
                $photo = Storage::putFile('userPhotos/', $request->photo);
            }

            User::where('id', $request->id)->update([
                'name' => $request->name,
                'address' => $request->address,
                'cpostal' => $request->cpostal,
                'photo' => $photo, //Pq queremos mandar o caminho
            ]);

            return redirect()->route('users.all')->with('message', 'User atualizado com Sucesso');

            //Se for novo
        } else {

            $request->validate([
                'name' => 'string|max:50',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:5'
            ]);

            User::insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            //return redirect()->route('users.create')->with('message','Adicionado com Sucesso');
            return redirect()->back()->with('message', 'Adicionado com Sucesso');
        }
    }
}
