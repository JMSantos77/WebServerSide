<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use App\Http\Resources\TaskResourceCollection;
use App\Models\Task;


use Illuminate\Http\Request;

class TaskApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new TaskResourceCollection(resource: Task::paginate(2));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'user_Id' => 'required',
        ]);

        $task = Task::create($request->all());

        return response()->json('task criada');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task): TaskResource
    {
        //return $task;
        return new TaskResource($task);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $task = $task->update($request->all());

        return response()->json('Tarefa Atualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
         $task = $task->delete();

        return response()->json('Deleted');
    }
}
