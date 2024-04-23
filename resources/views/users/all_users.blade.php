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
@endsection
