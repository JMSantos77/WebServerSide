<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller

{
    public function allTasks()
    {
        $tasks = $this->getAllTasks();

        return view('tasks.all_tasks', compact('tasks'));
    }

    public function getAllTasks()
    {
        $tasks = DB::table('tasks')
            ->select('tasks.*', 'users.name AS NomeUser',)
            ->join('users', 'users.id', '=', 'tasks.user_Id')
            ->get();

        return $tasks;
    }

    public function viewTask($id)
    {
        $task = DB::table('tasks')
            ->where('tasks.id', $id)
            ->select('tasks.*', 'users.name AS NomeUser',)
            ->join('users', 'users.id', '=', 'tasks.user_Id')
            ->first();


        return view('tasks.view_task', compact('task'));
    }

    //Adicionar Tarefa
    public function addTask()
    {
        $users = DB::table('users')->get();

        return view('tasks.add_task', compact('users'));
    }

    //Request Para trazer os dados
    public function createTask(Request $request)
    {

        if (isset($request->id)) {

            $request->validate([
                'name' => 'required|string|max:10',
                'description' => 'required|string|max:255',

            ]);

            DB::table('tasks')->where('id', $request->id)->update([
                'name' => $request->name,
                'description' => $request->description,

            ]);

            return redirect()->route('tasks.view')->with('message', 'Tarefa atualizada com sucesso!');
        } else {
            $request->validate([                     //Tratar das validações
                'name' => 'required|string|max:10',
                'description' => 'required|string|max:255',
                'user_Id' => 'required'
            ]);

            DB::table('tasks')->insert([
                'name' => $request->name,
                'description' => $request->description,
                'user_Id' => $request->user_Id,
            ]);

            return redirect()->route('tasks.view')->with('message', 'Tarefa adicionada com sucesso!');
        }
    }
}
