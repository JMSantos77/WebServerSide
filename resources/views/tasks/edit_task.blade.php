@extends('layouts.fe')

@section('content')
    <form method="POST" action="{{ route('tasks.create') }}">
        @csrf

        <input type="hidden" name="id" value="{{ $task->id }}"> <!--Input escondido para enviar user id -->

        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Id</label>
            <input readonly name="id" value="{{ $task->id }}" type="name" class="form-control"
                id="exampleInputName" aria-describedby="emailHelp">
            @error('id')
                Erro Not found
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">User</label>
            <input readonly name="NomeUser" value="{{ $task->NomeUser }}" type="name" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            @error('NomeUser')
                Nome maior que 50 Char!
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Tarefa</label>
            <input name="name" value="{{ $task->name }}" type="name" class="form-control" id="exampleInputName"
                aria-describedby="emailHelp">
            @error('name')
                Nome maior que 50 Char!
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Descrição</label>
            <input name="description" value="{{ $task->description }}" type="name" class="form-control"
                id="exampleInputName" aria-describedby="emailHelp">
            @error('description')
                Char error - Maior que 255!
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
