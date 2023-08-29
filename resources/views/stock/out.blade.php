@extends('layouts.app')

@section('content')
    <h2>Record Stock Out</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('stockout.store') }}" method="POST">
        @csrf
        <div id="entry-container">
            <div class="entry">
                <label for="item_name">Item Name:</label>
                <select name="entries[0][item_name]" required>
                    @foreach ($items as $item)
                        <option value="{{ $item->item_name }}">{{ $item->item_name }}</option>
                    @endforeach
                </select>

                <label for="stock_out_amount">Stock Out Amount:</label>
                <input type="number" name="entries[0][stock_out_amount]" min="1" required>

                <label for="weight">Weight:</label>
                <input type="number" name="entries[0][weight]" step="0.01" min="0" required>

                <label for="price">Price:</label>
                <input type="number" name="entries[0][price]" step="0.01" min="0" required>

                <label for="notes">Notes:</label>
                <textarea name="entries[0][notes]"></textarea>
            </div>
        </div>
        <button type="button" id="add-entry">+</button>
        <button type="submit">Record Stock Out</button>
    </form>

    <script>
        const entryContainer = document.getElementById('entry-container');
        const addEntryButton = document.getElementById('add-entry');
        let entryIndex = 1;

        addEntryButton.addEventListener('click', () => {
            const newEntry = document.createElement('div');
            newEntry.classList.add('entry');
            newEntry.innerHTML = `
                <label for="item_name">Item Name:</label>
                <select name="entries[${entryIndex}][item_name]" required>
                    @foreach ($items as $item)
                        <option value="{{ $item->item_name }}">{{ $item->item_name }}</option>
                    @endforeach
                </select>

                <label for="stock_out_amount">Stock Out Amount:</label>
                <input type="number" name="entries[${entryIndex}][stock_out_amount]" min="1" required>

                <label for="weight">Weight:</label>
                <input type="number" name="entries[${entryIndex}][weight]" step="0.01" min="0" required>

                <label for="price">Price:</label>
                <input type="number" name="entries[${entryIndex}][price]" step="0.01" min="0" required>

                <label for="notes">Notes:</label>
                <textarea name="entries[${entryIndex}][notes]"></textarea>
            `;

            entryContainer.appendChild(newEntry);
            entryIndex++;
        });
    </script>
@endsection
