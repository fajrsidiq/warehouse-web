<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Beli</title>
    <style>
        .row::after {
            content: "";
            clear: both;
            display: table;
        }

        .column {
            width: 48%;
            /* Set the width of each column */
            float: left;
            /* Float the columns to the left */
            margin-right: 2%;
            /* Add some margin for spacing */
            box-sizing: border-box;
            /* Include padding and border in the width */
        }

        .column:nth-child(even) {
            margin-right: 0;
            /* Remove margin for the last column */
        }
    </style>
</head>

<body>
    <div style="text-align: center;">
        <h2>Nota Beli</h2>
        <h1>UD Laut Biru Perkasa</h1>
    </div>
    <hr>
    <div class="row">
        <div class="column">
            <p>Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Komplek dermaga 3, Karangmulia, Tegalkamulyan, Kec. Cilacap Sel., Kabupaten
                Cilacap, Jawa Tengah</p>
            <p>No Telp &nbsp;&nbsp;&nbsp;&nbsp;: 081394060849</p>
            <p>Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: udlautbiruperkasa@gmail.com</p>
        </div>
        <div class="column">
            <p>Hari & Tanggal : {{ $date }}</p>
            <p>Supplier/Kapal &nbsp;:</p>
        </div>
    </div>
    <hr>
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="border: 1px solid #000; padding: 8px;">Berat</th>
                <th style="border: 1px solid #000; padding: 8px;">Nama Ikan</th>
                <th style="border: 1px solid #000; padding: 8px;">Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($entryData as $entry)
                <tr>
                    <td style="border: 1px solid #000; padding: 8px;">{{ $entry['weight'] }}KG</td>
                    <td style="border: 1px solid #000; padding: 8px;">{{ $entry['itemName'] }}</td>
                    <td style="border: 1px solid #000; padding: 8px;">{{ $entry['price'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr>

    <div style="text-align: right;">
        <p><strong>Total Berat:</strong> <span id="totalWeiht">{{ $totalweight }}KG</span></p>
        <p><strong>Total Harga:</strong> <span id="totalAmount">{{ $total }}</span></p>
    </div>
    <div>
        <p style="margin-top: 20px;">Hormat Kami</p>
    </div>
</body>

</html>
