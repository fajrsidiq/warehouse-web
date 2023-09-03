@extends('layouts.app')

@section('content')
    <h2>Stok Keluar</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('stockout.store') }}" method="POST">
        @csrf
        <div id="entry-container">
            <div class="entry">
                <label for="item_name">Nama Ikan:</label>
                <select name="entries[0][item_name]" required>
                    @foreach ($items as $item)
                        <option value="{{ $item->item_name }}">{{ $item->item_name }}</option>
                    @endforeach
                </select>

                <label for="stock_out_amount">Jumlah Ikan:</label>
                <input type="number" name="entries[0][stock_out_amount]" min="1" required>

                <label for="weight">Berat:</label>
                <input type="number" name="entries[0][weight]" step="0.01" min="0" required>

                <label for="price">Harga:</label>
                <input type="number" name="entries[0][price]" step="0.01" min="0" required>

                <label for="notes">Catatan:</label>
                <textarea name="entries[0][notes]"></textarea>
            </div>
        </div>
        <button type="button" id="add-entry">+</button>
        <button type="submit">Simpan</button>
        <button type="button" id="generate-out-invoice">Print Invoice</button>
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
        document.querySelector('#generate-out-invoice').addEventListener('click', function() {
            const currentDate = new Date().toLocaleDateString();
            const entryData = [];
            document.querySelectorAll('.entry').forEach((entry, index) => {
                const itemName = entry.querySelector('select[name^="entries["]').value;
                const weight = entry.querySelector('input[name^="entries["][name$="[weight]"]').value;
                const price = entry.querySelector('input[name^="entries["][name$="[price]"]').value;

                entryData.push({
                    entryIndex: index,
                    itemName,
                    weight,
                    price,
                });
            });
            fetch(`{{ route('pdf.out_invoice') }}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        date: currentDate,
                        entryData,
                    }),
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
        });
    </script>
@endsection
