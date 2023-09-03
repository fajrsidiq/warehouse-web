@extends('layouts.app')

@section('content')
    <h2>Data Stok</h2>
    <a href="{{ route('newitem.create') }}" class="button-link">
        <button>Baru</button>
    </a>
    <a href="{{ route('stock.in') }}" class="button-link">
        <button>Stok Masuk</button>
    </a>
    <a href="{{ route('stock.out') }}" class="button-link">
        <button>Stok Keluar</button>
    </a>

    <table class="table">
        <thead>
            <tr>
                <th>Nama Ikan</th>
                <th>Jumlah Ikan</th>
                <th>Berat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stocks as $stock)
                <tr>
                    <td>{{ $stock->item_name }}</td>
                    <td>{{ $stock->stock_amount }}</td>
                    <td>{{ $stock->weight }} kg </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
