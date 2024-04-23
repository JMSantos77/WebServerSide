<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UserController;

class TaskController extends Controller

{
    public function viewTasks(){
        $tasks = $this->getTasks();

        return view('users.tasks', compact( 'tasks'));
    }

    public function getTasks(){
        $tasks = DB::table('tasks')
        ->join('users','users.id', '=', 'tasks.user_Id')
        ->select('tasks.*', 'users.name AS NomeUser',)
        ->get();
        //dd(  $tasks);
        return $tasks;

    }


}
