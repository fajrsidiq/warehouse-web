@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Jenis Baru</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('newitem.store') }}" method="POST">
                            @csrf

                            <div class="form-group row mb-3">
                                <label for="item_name">Nama Barang :</label>
                                <div>
                                    <input type="text" name="item_name" id="item_name" required>
                                </div>
                            </div>

                            <button type="submit">Tambah Barang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
