@extends('layouts.fe') <!--Para immportar o layout-->

@section('content')



    <h1>Olá, eu sou o utilizador {{ $allUsers[0]->name }}!</h1>

    <h5>{{ $delegadoTurma->name }} : {{ $delegadoTurma->email }}</h5>

    <br>

    <!--A colocar o array numa table-->

    <table class="table">

        <thead class="table-secondary">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Ver</th>
                <th scope="col">Apagar</th>
            </tr>
        </thead>

        <tbody class="table-warning">
            @foreach ($allUsers as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('users.view', $user->id) }}"><button class="btn btn-info">Ver</button> </a>

                    </td>
                    <td>
                        <a href="{{ route('users.delete', $user->id) }}"><button class="btn btn-danger">Apagar</button> </a>

                    </td>
                </tr>
            @endforeach

        </tbody>

    </table>

    <h5>Adicionar User</h5>

    {{-- Mensagem de sucesso se criar user ok --}}
    @if (@session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form method="POST" action="{{ route('users.create') }}"> <!--Define tipo POST e indica ação = rota-->
        @csrf

        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Nome</label>
            <input name="name" value="" type="name" class="form-control" id="exampleInputName"
                aria-describedby="emailHelp">
            @error('name')
                Nome maior que 50 Char!
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="email" value="" type="email" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            @error('email')
            Email já existe!
        @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input name="password" value="" type="password" class="form-control" id="exampleInputPassword1">
            @error('password')
                Password menor que 5 Char!
            @enderror
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
