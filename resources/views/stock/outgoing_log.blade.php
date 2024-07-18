@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Data Stok Keluar</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('stockout.search') }}" method="GET">
                    <label for="date">Cari Tanggal (yyyy-mm-dd):</label>
                    <input type="text" id="date" name="date" placeholder="yyyy-mm-dd" required >
                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>
                <div class="mt-3">
                    <button id="pdf-button" class="btn btn-primary">Print PDF</button>
                </div>
            
                <!-- Responsive table container -->
                <div class="table-responsive mt-3">
                    <table class="table table-striped table-bordered">
                        <thead class="table-primary">
                            <tr>
                                <th>Tanggal</th>
                                <th>Nama Barang</th>
                                <th>Jumlah/Pcs</th>
                                <th>Berat/Kg</th>
                                <th>Harga/Kg</th>
                                <th>Catatan</th>
                                <th>Actions</th>
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
                                    <td>
                                        <form action="{{ route('logs.outgoing.delete', $log->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this log entry?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- End of responsive table container -->
            </div>
        </div>
    </div>

    <script>
        document.getElementById('pdf-button').addEventListener('click', function() {
            const currentUrl = window.location.href;
            const url = new URL(currentUrl);
            const dateParam = url.searchParams.get('date');
    
            if (dateParam) {
                const encodedDate = encodeURIComponent(dateParam);
                fetch(`{{ route('pdf.generateOutgoingLogPDF') }}?date=${encodedDate}`, {
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
                fetch('{{ route('pdf.generateOutgoingLogPDF') }}', {
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
