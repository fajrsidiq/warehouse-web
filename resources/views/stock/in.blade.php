@extends('layouts.app')

@section('content')
    <h2>Stok Masuk</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('stockin.store') }}" method="POST">
        @csrf
        <div id="entry-container">
            <div class="entry">
                <label for="item_name">Nama Ikan:</label>
                <select name="entries[0][item_name]" required>
                    @foreach ($items as $item)
                        <option value="{{ $item->item_name }}">{{ $item->item_name }}</option>
                    @endforeach
                </select>

                <label for="stock_in_amount">Jumlah Ikan:</label>
                <input type="number" name="entries[0][stock_in_amount]" min="1" required>

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
        <button type="button" id="generate-in-invoice">Print Invoice</button>
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

                <label for="stock_in_amount">Stock In Amount:</label>
                <input type="number" name="entries[${entryIndex}][stock_in_amount]" min="1" required>

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
        document.querySelector('#generate-in-invoice').addEventListener('click', function() {
            // Get the current date
            const currentDate = new Date().toLocaleDateString();

            // Extract data from each entry's item name, weight, and price fields
            const entryData = [];
            document.querySelectorAll('.entry').forEach((entry, index) => {
                const itemName = entry.querySelector('select[name^="entries["]').value;
                const weight = entry.querySelector('input[name^="entries["][name$="[weight]"]').value;
                const price = entry.querySelector('input[name^="entries["][name$="[price]"]').value;

                entryData.push({
                    entryIndex: index, // Include the entry index
                    itemName,
                    weight,
                    price,
                });
            });

            // Send an Ajax request to the server to generate the PDF with the extracted data and current date
            fetch(`{{ route('pdf.in_invoice') }}`, {
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
                    // Create a URL for the generated PDF blob
                    const pdfUrl = URL.createObjectURL(blob);

                    // Open the PDF in a new browser tab
                    window.open(pdfUrl, '_blank');

                    // Clean up the URL object to release resources
                    URL.revokeObjectURL(pdfUrl);
                })
                .catch(error => {
                    console.error('Error generating PDF:', error);
                });
        });
    </script>
@endsection
