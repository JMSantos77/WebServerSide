<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller

{
    public function allTasks(){
        $tasks = $this->getAllTasks();

        return view('tasks.all_tasks', compact('tasks'));
    }

    public function getAllTasks(){
        $tasks = DB::table('tasks')
            ->select('tasks.*', 'users.name AS NomeUser',)
            ->join('users', 'users.id', '=', 'tasks.user_Id')
            ->get();

        return $tasks;
    }
}
