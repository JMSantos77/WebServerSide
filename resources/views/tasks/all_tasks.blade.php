@extends('layouts.fe') <!--Para immportar o layout-->

@section('content')
    <h1>Tarefas</h1>

    <table class="table">
        <thead class="table-secondary">
            <tr>
                <th scope="col">#</th>
                <th scope="col">User</th>
                <th scope="col">Tarefa</th>
                <th scope="col">Descrição</th>
            </tr>
        </thead>

        <tbody class="table-warning">
            @foreach ($tasks as $task)
                <tr>
                    <th scope="row">{{ $task->id }}</th>
                    <td>{{ $task->NomeUser }}</td>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->description }}</td>
                    <td>
                        <a href="{{ route('task.edit', $task->id) }}"><button class="btn btn-info">Ver/Editar</button> </a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <a href="{{ route('tasks.add') }}">
        <button>Adicionar Tarefa</button>
    </a>
@endsection
