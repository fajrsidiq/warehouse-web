@extends('layouts.app')

@section('content')
    <h2>Create New Item</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('newitem.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="item_name">Item Name:</label>
            <input type="text" name="item_name" id="item_name" required>
        </div>

        <div class="form-group">
            <label for="stock_amount">Stock Amount:</label>
            <input type="number" name="stock_amount" id="stock_amount">
        </div>

        <div class="form-group">
            <label for="weight">Weight:</label>
            <input type="number" name="weight" id="weight" step="0.01" min="0">
        </div>

        <button type="submit">Add Item</button>
    </form>
@endsection
