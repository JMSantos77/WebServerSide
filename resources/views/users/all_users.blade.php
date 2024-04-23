@extends('layouts.fe') <!--Para immportar o layout-->

@section('content')
    <h1>Olá, eu sou o utilizador {{ $allUsers[0] -> name }}!</h1>

    <h5>{{$delegadoTurma -> name}} : {{$delegadoTurma -> email}}</h5>

    <br>

    <!--A colocar o array numa table-->

    <table class="table">
        <thead class="table-secondary">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
            </tr>
        </thead>

        <tbody class="table-warning">
            @foreach ($allUsers as $user)
                <tr>
                    <th scope="row">{{ $user -> id }}</th>
                    <td>{{ $user -> name }}</td>
                    <td>{{ $user -> email }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
