@extends('layouts.app')

@section('content')
    <h2>Current Stock</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Stock Amount</th>
                <th>Weight</th>
                <!-- Add more columns if needed -->
            </tr>
        </thead>
        <tbody>
            @foreach ($stocks as $stock)
                <tr>
                    <td>{{ $stock->item_name }}</td>
                    <td>{{ $stock->stock_amount }}</td>
                    <td>{{ $stock->weight }} kg </td>
                    <!-- Add more columns if needed -->
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
    