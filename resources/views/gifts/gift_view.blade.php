@extends('layouts.fe')

@section('content')
    <h1>Prenda</h1>

    <table class="table">

        <thead class="table-secondary">
            <tr>
                <th scope="col">Nome Prenda</th>
                <th scope="col">User</th>
                <th scope="col">Descrição</th>
                <th scope="col">Valor Previsto</th>
                <th scope="col">Valor Gasto</th>
            </tr>
        </thead>

        <tbody class="table-warning">

            <tr>
                <th scope="row">{{ $gift->giftName }}</th>
                <td>{{ $gift->userName }}</td>
                <td>{{ $gift->giftDescription }}</td>
                <td>{{ $gift->predictedValue }}</td>
                <td>{{ $gift->spentValue }}</td>
            </tr>

        </tbody>

    </table>
@endsection
