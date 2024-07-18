@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Stok Masuk</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('stockin.store') }}" method="POST">
                            @csrf
                            <div id="entry-container">
                                <div class="entry">
                                    <div class="row mb-3">
                                        <label for="item_name" class="col-md-4 col-form-label text-md-end">Nama
                                            Barang:</label>
                                        <div class="col-md-6">
                                            <select name="entries[0][item_name]" required>
                                                @foreach ($items->sortBy('item_name') as $item)
                                                    <option value="{{ $item->item_name }}">{{ $item->item_name }}</option>
                                                @endforeach
                                            </select>                                            
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="stock_in_amount" class="col-md-4 col-form-label text-md-end">Jumlah/Pcs:</label>
                                        <div class="col-md-6">
                                            <input type="number" name="entries[0][stock_in_amount]" min="0">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="weight" class="col-md-4 col-form-label text-md-end">Berat/Kg:</label>
                                        <div class="col-md-6">
                                            <input type="number" name="entries[0][weight]" step="0.01" min="0"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="price" class="col-md-4 col-form-label text-md-end">Harga/Kg:</label>
                                        <div class="col-md-6">
                                            <input type="number" name="entries[0][price]" step="0.01" min="0"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="notes" class="col-md-4 col-form-label text-md-end">Catatan:</label>
                                        <div class="col-md-6">
                                            <textarea name="entries[0][notes]"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 offset-md-4">
                                <button type="button" id="add-entry">+</button>
                                <button type="button" id="generate-in-invoice">Print Kwitansi</button>
                                <button type="submit">Simpan</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const entryContainer = document.getElementById('entry-container');
        const addEntryButton = document.getElementById('add-entry');
        let entryIndex = 1;

        addEntryButton.addEventListener('click', () => {
            const newEntry = document.createElement('div');
            newEntry.classList.add('entry');
            newEntry.innerHTML = `
                <div class="row mb-3">
                    <label for="item_name" class="col-md-4 col-form-label text-md-end">Nama Barang:</label>
                    <div class="col-md-6">
                        <select name="entries[${entryIndex}][item_name]" required>
                            @foreach ($items as $item)
                                <option value="{{ $item->item_name }}">{{ $item->item_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="stock_in_amount" class="col-md-4 col-form-label text-md-end">Jumlah/Pcs:</label>
                    <div class="col-md-6">
                        <input type="number" name="entries[${entryIndex}][stock_in_amount]" min="0">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="weight" class="col-md-4 col-form-label text-md-end">Berat/Kg:</label>
                    <div class="col-md-6">
                        <input type="number" name="entries[${entryIndex}][weight]" step="0.01" min="0" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="price" class="col-md-4 col-form-label text-md-end">Harga/Kg:</label>
                    <div class="col-md-6">
                        <input type="number" name="entries[${entryIndex}][price]" step="0.01" min="0" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="notes" class="col-md-4 col-form-label text-md-end">Catatan:</label>
                    <div class="col-md-6">
                        <textarea name="entries[${entryIndex}][notes]"></textarea>
                    </div>
                </div>
                `;
            entryContainer.appendChild(newEntry);
            entryIndex++;
        });
        document.querySelector('#generate-in-invoice').addEventListener('click', function() {
            const currentDate = new Date().toLocaleDateString('id-ID', {
                weekday: 'long',
                year: 'numeric',
                month: '2-digit',
                day: '2-digit'
            });
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
