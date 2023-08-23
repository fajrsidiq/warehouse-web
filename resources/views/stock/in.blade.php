@extends('layouts.app')

@section('content')
    <h2>Record Stock In</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('stockin.store') }}" method="POST">
        @csrf

        <label for="item_name">Item Name:</label>
        <select name="item_name" id="item_name" required>
            @foreach($items as $item)
                <option value="{{ $item->item_name }}">{{ $item->item_name }}</option>
            @endforeach
        </select>

        <label for="stock_in_amount">Stock In Amount:</label>
        <input type="number" name="stock_in_amount" id="stock_in_amount" min="1" required>

        <label for="weight">Weight:</label>
        <input type="number" name="weight" id="weight" step="0.01" min="0" required>

        <label for="price">Price:</label>
        <input type="number" name="price" id="price" step="0.01" min="0" required>

        <label for="notes">Notes:</label>
        <textarea name="notes" id="notes"></textarea>

        <button type="submit">Record Stock In</button>
    </form>
@endsection
