@extends('layouts.fe')

@section('content')
    <h1>Olá, sou um user</h1>

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

            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
        @endsection
