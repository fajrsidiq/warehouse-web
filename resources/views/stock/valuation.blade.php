@extends('layouts.app')

@section('content')
<style>
    .total-valuation{
        font-size: 20px;
    }
</style>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Valuasi Ikan</h2>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Berat/Kg</th>
                        <th>Harga/Kg</th>
                        <th>Harga  Total/Barang</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalValuation = 0;
                    @endphp
        
                    @foreach ($stocks as $stock)
                        <tr>
                            <td>{{ $stock->item_name }}</td>
                            <td>{{ $stock->weight }} kg</td>
                            <td>
                                <input type="number" step="0.01" name="price" id="price{{ $stock->id }}" class="form-control">
                            </td>
                            <td id="valuation{{ $stock->id }}">0.00</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        
            <div style="display: flex; justify-content: flex-end; align-items: center; padding-top: 10px; padding-right: 40px;">
                <h4 style="margin: 0;">Total Harga Barang:</h4>
                <p id="total-valuation" style="margin: 0; margin-left: 10px; font-size: 20px;">Rp 0.00</p>
            </div>
            <button id="calculateValuation" class="btn btn-primary">Hitung Valuasi</button>
        </div>
    </div>
</div>


    <script>
        function formatMoney(number) {
            return 'Rp ' + number.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        }

        document.getElementById('calculateValuation').addEventListener('click', function() {
            var totalValuation = 0;

            @foreach ($stocks as $stock)
                var price{{ $stock->id }} = parseFloat(document.getElementById('price{{ $stock->id }}').value) || 0;
                var weight{{ $stock->id }} = parseFloat({{ $stock->weight }}) || 0;
                var valuation{{ $stock->id }} = (price{{ $stock->id }} * weight{{ $stock->id }}).toFixed(2);
                document.getElementById('valuation{{ $stock->id }}').textContent = formatMoney(parseFloat(valuation{{ $stock->id }}));
                totalValuation += parseFloat(valuation{{ $stock->id }});
            @endforeach

            document.getElementById('total-valuation').textContent = formatMoney(totalValuation);
        });
    </script>
@endsection
