@extends('layouts.app')

@section('content')
    <h2>Ikan Baru</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('newitem.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="item_name">Nama Ikan    :</label>
            <input type="text" name="item_name" id="item_name" required>
        </div>
        
        <button type="submit">Tambah Item</button>
    </form>
@endsection
