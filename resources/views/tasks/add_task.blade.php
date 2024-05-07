@extends('layouts.fe')
@section('content')
    <h1>Tarefas</h1>

    @if (@session('message'))
        <div class="alert alert-sucess">
            {{ session('message') }}
        </div>
    @endif


    <!--Form-->
    <form action="{{ route('tasks.create') }}" method="POST">
    @csrf



        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome</label>
            <input name="name" value="" type="text" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            @error('name')
                Nome maior que 50 Char!
            @enderror
            <!--Em cada form adicionar name, value e text. COMO É UM INSERT, o value fica vazio-->
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Descrição</label>
            <input type="text" name="description" value="" class="form-control" id="exampleInputPassword1">
            @error('description')
                Char error - Maior que 255!
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Utilizador</label>
            <input type="number" name="user_Id" value="" class="form-control" id="exampleInputPassword1">
            @error('user_id')
                Not found!!
            @enderror
        </div>

        <select name="user_Id" id="">
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }} </option>
            @endforeach
        </select>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
@endsection
