<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
</head>
<body>
    <div style="text-align: center;">
        <h2>Invoice</h2>
    </div>
    
    <div style="text-align: center;">
        <p>Warehouse Address: 123 Main Street, Cityville</p>
        <p>{{ $date }}</p>
    </div>

    <hr>

    <div style="text-align: center;">
        <p><strong>Buy / Sell</strong></p>
    </div>

    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="border: 1px solid #000; padding: 8px;">Weight</th>
                <th style="border: 1px solid #000; padding: 8px;">Item Name</th>
                <th style="border: 1px solid #000; padding: 8px;">Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($entryData as $entry)
                <tr>
                    <td style="border: 1px solid #000; padding: 8px;">{{ $entry['weight'] }}</td>
                    <td style="border: 1px solid #000; padding: 8px;">{{ $entry['itemName'] }}</td>
                    <td style="border: 1px solid #000; padding: 8px;">{{ $entry['price'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr>

    <div style="text-align: right;">
        <p><strong>Total:</strong> <span id="totalAmount">{{$total}}</span></p>
    </div>
</body>
</html>
