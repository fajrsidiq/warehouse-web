@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Riwayat Penghapusan</h2>
            </div>
            <div class="card-body">
                <!-- Responsive table container -->
                <div class="table-responsive">
                    <table id="delete-history-table" class="table table-striped table-bordered">
                        <thead class="table-primary">
                            <tr>
                                <th>Nama Barang</th>
                                <th>Jumlah Stok</th>
                                <th>Berat/Kg</th>
                                <th>Harga/Kg</th>
                                <th>Catatan</th>
                                <th>Tipe</th>
                                <th>Waktu Penghapusan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($deleteHistory as $history)
                                <tr>
                                    <td>{{ $history->item_name }}</td>
                                    <td>{{ $history->stock_in_amount }}</td>
                                    <td>{{ $history->weight }}</td>
                                    <td>{{ $history->price }}</td>
                                    <td>{{ $history->notes }}</td>
                                    <td>{{ ucfirst($history->type) }}</td>
                                    <td>{{ $history->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- End of responsive table container -->
            </div>
        </div>
    </div>
@endsection
