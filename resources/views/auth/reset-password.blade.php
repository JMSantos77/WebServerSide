@extends('layouts.fe') <!--Para immportar o layout-->

@section('content')

    <h5>Adicionar User</h5>

    {{-- Mensagem de sucesso se criar user ok --}}
    @if (@session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.update') }}"> <!--Define tipo POST e indica ação = rota-->
        @csrf

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="email" value="{{request()->email}}" type="email" class="form-control" id="exampleInputEmail1"
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

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
            <input name="password_confirmation" value="" type="password" class="form-control" id="exampleInputPassword1">
            @error('password')
                Password menor que 5 Char!
            @enderror
        </div>

        <input type="hidden" name="token" value="{{request()->route('token')}}">

        <button type="submit" class="btn btn-primary">Update </button>
    </form>
@endsection
