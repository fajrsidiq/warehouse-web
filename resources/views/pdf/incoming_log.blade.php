<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Stok Masuk</title>
    <style>
        h1 {
            text-align: center;
        }

        .pdf-table {
            border-collapse: collapse;
            width: 100%;
        }

        .pdf-table th,
        .pdf-table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
    </style>

</head>

<body>
    <h1>Data Stok Masuk</h1>
    <table id="log-table" class="pdf-table">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nama Ikan</th>
                <th>Jumlah Ikan</th>
                <th>Berat</th>
                <th>Harga</th>
                <th>Catatan</th>
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
