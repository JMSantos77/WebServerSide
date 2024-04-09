@extends('layouts.fe') <!--Para immportar o layout-->

@section('content')
    <h1>Olá, eu sou o utilizador!</h1>

    <br>

    <!--A colocar o array numa table-->

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Telefone</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($allUsers as $user)
                <tr>
                    <th scope="row">{{ $user['id'] }}</th>
                    <th>{{ $user['name'] }}</th>
                    <th>{{ $user['phone'] }}</th>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
