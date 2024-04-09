@extends('layouts.fe') <!--Para immportar o layout-->

@section('content')
    <h4>Hello World</h4>
    <h3>Viva Turma!</h3>

    <h2>A soma é {{$sum}}</h2> <!--*Fsum, criada no IndexController, chamada aqui-->

    <h2>Mensagem: {{$helloVar}}</h2>

    <h2>{{$myArray['name']}}</h2> <!--A chamar a posição do array pela Key-->
@endsection
