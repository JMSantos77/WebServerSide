@extends('layouts.fe')

@section('content')
    <h1>Lista de Prendas</h1>

    <table class="table">

        <thead class="table-secondary">
            <tr>
                <th scope="col">Nome Prenda</th>
                <th scope="col">User</th>
                <th scope="col">Descrição</th>
                <th scope="col">Ver</th>
                <th scope="col">Apagar</th>
            </tr>
        </thead>

        <tbody class="table-warning">

            @foreach ($allGifts as $gifts)
                <tr>
                    <th scope="row">{{ $gifts->giftName }}</th>
                    <td>{{ $gifts->userName }}</td>
                    <td>{{ $gifts->predictedValue }}</td>
                    <td>
                        <a href="{{ route('gifts.gift_view', $gifts->id) }}"><button class="btn btn-info">Ver</button> </a>

                    </td>
                    <td>
                        <a href="{{ route('gift.delete', $gifts->id) }}"><button class="btn btn-danger">Apagar</button> </a>

                    </td>
                </tr>
            @endforeach

        </tbody>

    </table>
@endsection
