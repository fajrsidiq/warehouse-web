@extends('layouts.app')

@section('content')
    <h2>Incoming Stock Logs</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Timestamp</th>
                <th>Item Name</th>
                <th>Amount</th>
                <th>Weight</th>
                <th>Price</th>
                <th>Notes</th>
            </tr>
        </thead>
        <tbody>
            @foreach($incomingLogs as $log)
                <tr>
                    <td>{{ $log->created_at }}</td>
                    <td>{{ $log->item_name }}</td>
                    <td>{{ $log->stock_in_amount }}</td>
                    <td>{{ $log->weight}}</td>
                    <td>{{ $log->price }}</td>
                    <td>{{ $log->notes }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
