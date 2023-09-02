<!-- resources/views/pdf/incoming_log.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Incoming Stock Log</title>
    <!-- Add your styles here if needed -->
    <style>
        .pdf-table {
            border-collapse: collapse;
            width: 100%;
        }
    
        .pdf-table th, .pdf-table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
    </style>
    
</head>
<body>
    <h1>Incoming Stock Log</h1>
    <table id="log-table" class="pdf-table">
        <thead>
            <tr>
                <th>Timestamp</th>
                <th>Item Name</th>
                <th>Stock In Amount</th>
                <th>Weight</th>
                <th>Price</th>
                <th>Notes</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($incomingLogs as $log)
                <tr>
                    <td>{{ $log->created_at }}</td>
                    <td>{{ $log->item_name }}</td>
                    <td>{{ $log->stock_in_amount }}</td>
                    <td>{{ $log->weight }}KG</td>
                    <td>Rp.{{ $log->price }}</td>
                    <td>{{ $log->notes }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
