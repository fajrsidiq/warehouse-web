<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Stok</title>
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
    <h1>Data Stok</h1>
    <table id="log-table" class="pdf-table">
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
                    <td>{{ $stock->weight }}KG</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
