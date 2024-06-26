@extends('layouts.fe')
@section('content')

<form method="POST" action="{{route('login')}}">
    @csrf

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> <!--adicionar name="email" -->
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input name="password" type="password" class="form-control" id="exampleInputPassword1"> <!--adicionar name="password" -->
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    {{-- Adicionei a verificação --}}
    <a href="{{route('password.request')}}">Esqueceu a Pass?</a>
  </form>

@endsection
