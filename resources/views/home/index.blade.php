@extends('layouts.fe') <!--Para immportar o layout-->

@section('content') <!-- Para importar o content do layout-->

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

        <br>

        <img class="test-img" src="{{ asset('images/Star-Wars-45-2024.webp') }}" alt="starWars">
    </ul>

    @endsection
