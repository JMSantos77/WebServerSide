@extends('layouts.fe') <!--Para immportar o layout-->

@section('content')
    <h4>Dashboard Page</h4>

    {{-- <h3 class="alert">Olá {{ Auth::user()->name }}</h3> --}}

    <h3 class="alert alert-success">
        {{ Auth::user()->user_type == 2 ? 'Olá Admin Fantástico ' . Auth::user()->name : 'Olá Pobre!' }}</h3>

    {{-- Ou a chamar através do type definido em User.php, melhor prática caso troquem o valor da Const --}}
    <h3 class="alert alert-success">
        {{ Auth::user()->user_type == \App\models\User::TYPE_ADMIN ? 'Olá Admin Fantástico ' . Auth::user()->name : 'Olá Pobre!' }}</h3>
@endsection
