@extends('layouts.app')

@section('content')
    <h2>Edit Item Name</h2>

    <form method="POST" action="{{ route('stocks.update', $stock) }}">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="item_name">Nama Ikan</label>
            <input type="text" id="item_name" name="item_name" class="form-control" value="{{ $stock->item_name }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Nama Ikan</button>
    </form>
@endsection
