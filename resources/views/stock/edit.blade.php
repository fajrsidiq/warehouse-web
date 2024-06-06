@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit Nama Ikan</h2>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="{{ route('stocks.update', $stock) }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group row mb-3">
                                <label for="item_name">Nama Ikan</label>
                                <div>
                                    <input type="text" id="item_name" name="item_name" class="form-control"
                                        value="{{ $stock->item_name }}" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Nama Ikan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
