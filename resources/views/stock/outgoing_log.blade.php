@extends('layouts.app')

@section('content')
    <style>
        .text-link {
            color: blue;
            text-decoration: underline;
            cursor: pointer;
        }

        .text-link.active {
            font-weight: bold;
        }

        .text-link.disabled {
            color: black;
            cursor: default;
            text-decoration: none;
        }
    </style>
    <h2>Outgoing Stock Logs</h2>

    <div class="mb-3">
        <a href="{{ route('logs.outgoing') }}?sort=latest"
            class="text-link @if ($sort === 'latest') active disabled @endif">Sort by Latest</a> |
        <a href="{{ route('logs.outgoing') }}?sort=item"
            class="text-link @if ($sort === 'item') active disabled @endif">Sort by Item Name</a>
    </div>
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
            @foreach ($outgoingLogs as $log)
                <tr>
                    <td>{{ $log->created_at }}</td>
                    <td>{{ $log->item_name }}</td>
                    <td>{{ $log->stock_out_amount }}</td>
                    <td>{{ $log->weight }}</td>
                    <td>{{ $log->price }}</td>
                    <td>{{ $log->notes }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
