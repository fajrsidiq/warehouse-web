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
        <button type="button" id="pdf-button">print pdf</button>
        
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
    <script>
        document.getElementById('pdf-button').addEventListener('click', function() {
            fetch('{{ route('pdf.current_stock') }}', {
                    method: 'GET',
                })
                .then(response => response.blob())
                .then(blob => {
                    const pdfUrl = URL.createObjectURL(blob);
                    window.open(pdfUrl, '_blank');
                    URL.revokeObjectURL(pdfUrl);
                })
                .catch(error => {
                    console.error('Error generating PDF:', error);
                });

        })
    </script>
@endsection
