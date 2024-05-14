@extends('layouts.fe')

@section('content')

    <h1>Olá, sou um user</h1>

    <form method="POST" action="{{ route('users.create') }}" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id" value="{{$user->id}}"> <!--Input escondido para enviar user id -->

        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Nome</label>
            <input name="name" value="{{ $user->name }}" type="name" class="form-control" id="exampleInputName"
                aria-describedby="emailHelp">
            @error('name')
                Nome maior que 50 Char!
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">E-Mail</label>
            <input readonly name="email" value="{{ $user->email }}" type="email" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            @error('email')
                Email já existe!
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Morada</label>
            <input name="address" value="{{ $user->address }}" type="name" class="form-control" id="exampleInputName"
                aria-describedby="emailHelp">
            @error('address')
                Erro de name
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Código Postal</label>
            <input name="cpostal" value="{{ $user->cpostal }}" type="name" class="form-control" id="exampleInputName"
                aria-describedby="emailHelp">
            @error('cpostal')
                Erro de name
            @enderror
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Adicione Foto</label>
            <input name="photo" accept="image/*" value="{{ $user->cpostal }}" type="file" class="form-control" id="photo"
                aria-describedby="emailHelp">
            @error('photo')
            Erro de Foto
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
