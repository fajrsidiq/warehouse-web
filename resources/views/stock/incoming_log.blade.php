@extends('layouts.app')

@section('content')
    <h2>Data Stok Masuk</h2>

    <form action="{{ route('stockin.search') }}" method="GET">
        <label for="date">Cari Tanggal (yyyy-mm-dd):</label>
        <input type="text" id="date" name="date" placeholder="yyyy-mm-dd" required>
        <button type="submit">Cari</button>
    </form>

    <div>
        <button id="pdf-button" class="btn btn-primary">Print PDF</button>
    </div>

    <table id="log-table" class="table">
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

    <script>
        document.getElementById('pdf-button').addEventListener('click', function () {
            const currentUrl = window.location.href;
            const url = new URL(currentUrl);
            const dateParam = url.searchParams.get('date');
    
            if (dateParam) {
                const encodedDate = encodeURIComponent(dateParam);
                fetch(`{{ route('pdf.generateIncomingLogPDF') }}?date=${encodedDate}`, {
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
            } else {
                fetch('{{ route('pdf.generateIncomingLogPDF') }}', {
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
            }
        });
    </script>
    
    
    
    
@endsection
