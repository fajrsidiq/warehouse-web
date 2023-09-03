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
        // Add a click event listener to the PDF generation button
        document.getElementById('pdf-button').addEventListener('click', function () {
            // Get the current URL
            const currentUrl = window.location.href;
    
            // Extract the date parameter from the URL if it exists
            const url = new URL(currentUrl);
            const dateParam = url.searchParams.get('date');
    
            if (dateParam) {
                // Encode the date to ensure proper URL formatting
                const encodedDate = encodeURIComponent(dateParam);
    
                // Send an Ajax request to the server to generate the PDF with the selected date
                fetch(`{{ route('pdf.generateIncomingLogPDF') }}?date=${encodedDate}`, {
                    method: 'GET',
                })
                .then(response => response.blob())
                .then(blob => {
                    // Create a URL for the generated PDF blob
                    const pdfUrl = URL.createObjectURL(blob);
    
                    // Open the PDF in a new browser tab
                    window.open(pdfUrl, '_blank');
    
                    // Clean up the URL object to release resources
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
                // Create a URL for the generated PDF blob
                const pdfUrl = URL.createObjectURL(blob);

                // Open the PDF in a new browser tab
                window.open(pdfUrl, '_blank');

                // Clean up the URL object to release resources
                URL.revokeObjectURL(pdfUrl);
            })
            .catch(error => {
                console.error('Error generating PDF:', error);
            });
            }
        });
    </script>
    
    
    
    
@endsection
