@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card mb-4">
            <div class="card-header">
                <h4>Statistik Keluar Masuk Barang dalam 30 Hari terakhir</h4>

                <div class="row mb-3">
                    <div class="col-12">
                        <h5>Barang Keluar Paling Banyak</h5>
                    </div>
                    @if ($mostStockedOut)
                        <div class="col-6">
                            <p class="card-text">{{ $mostStockedOut->item_name }}</p>
                        </div>
                        <div class="col-6 text-right">
                            <p class="card-text">{{ $mostStockedOut->total_weight }} kg</p>
                        </div>
                    @else
                        <div class="col-12">
                            <p class="card-text">Tidak ada barang keluar dalam 30 hari terakhir</p>
                        </div>
                    @endif
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <h5>Barang Keluar Paling Sedikit</h5>
                    </div>
                    @if ($leastStockedOut)
                        <div class="col-6">
                            <p class="card-text">{{ $leastStockedOut->item_name }}</p>
                        </div>
                        <div class="col-6 text-right">
                            <p class="card-text">{{ $leastStockedOut->total_weight }} kg</p>
                        </div>
                    @else
                        <div class="col-12">
                            <p class="card-text">Tidak ada barang keluar dalam 30 hari terakhir</p>
                        </div>
                    @endif
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <h5>Barang Masuk Paling Banyak</h5>
                    </div>
                    @if ($mostStockedIn)
                        <div class="col-6">
                            <p class="card-text">{{ $mostStockedIn->item_name }}</p>
                        </div>
                        <div class="col-6 text-right">
                            <p class="card-text">{{ $mostStockedIn->total_weight }} kg</p>
                        </div>
                    @else
                        <div class="col-12">
                            <p class="card-text">Tidak ada barang masuk dalam 30 hari terakhir</p>
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-12">
                        <h5>Barang Masuk Paling Sedikit</h5>
                    </div>
                    @if ($leastStockedIn)
                        <div class="col-6">
                            <p class="card-text">{{ $leastStockedIn->item_name }}</p>
                        </div>
                        <div class="col-6 text-right">
                            <p class="card-text">{{ $leastStockedIn->total_weight }} kg</p>
                        </div>
                    @else
                        <div class="col-12">
                            <p class="card-text">Tidak ada barang masuk dalam 30 hari terakhir</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h2>Diagram dan Tabel Data Stok</h2>
        <div class="card">
            <div class="card-body">
                <div id="chart">
                    {!! $chart->container() !!}
                </div>
            </div>
            <div class="card-body">
                <button type="button" id="pdf-button" style="margin-bottom: 10px;">print tabel ke pdf</button>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Barag</th>
                            <th>Jumlah Stok</th>
                            <th>Berat/Kg</th>                            
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
            </div>
        </div>
    </div>
    {!! $chart->script() !!}
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
