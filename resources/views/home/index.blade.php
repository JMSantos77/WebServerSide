@extends('layouts.fe') <!--Para immportar o layout-->

@section('content')
    <!-- Para importar o content para o layout-->

    <!--tudo que estiver aqui aparece abaixo do definido no layout-->
    <h2>Página Home</h2>

    <ul><!--Encapsular a li no <a> faz com que seja clicável-->
        <a href="{{ route('home.welcome') }}">
            <li>Welcome</li>
        </a>

        <a href="{{ route('home.hello') }}">
            <li>Hello</li>
        </a>

        <a href="{{ route('users.all') }}">
            <li>Users</li>
        </a>

        <a href="{{ route('tasks.view') }}">
            <li>Tasks</li>
        </a>

        <a href="{{ route('gifts.users_Gifts') }}">
            <li>Prendas</li>
        </a>

        <br>

        <img class="test-img" src="{{ asset('images/Star-Wars-45-2024.webp') }}" alt="starWars">

        <br>

        <h5>Info do Cesae:</h5>
        <h5> Nome: {{ $cesaeInfo['name'] }} </h5>
        <h5>Morada: {{ $cesaeInfo['adress'] }}</h5>
        <h5>Email: {{ $cesaeInfo['email'] }}</h5>
    </ul>
@endsection

<!--Início outro content-->
@section('content2')
    <h3>Content 2</h3>
@endsection
