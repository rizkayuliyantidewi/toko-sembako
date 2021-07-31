@extends('layouts.app')

@section('content')
<div class="container">
    @include('shared.components.alert')
    <div class="row justify-content-center mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Ubah Data Transaksi
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.transactions.update', ['transaction' => $transaction]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nama Pelanggan <span class="text-danger">*</span></label>
                            <select name="customer_id" class="form-control" required>
                                <option value="">Pilih Pelanggan</option>
                                @foreach ($customers as $item)
                                    <option value="{{ $item->id }}" @if (old('customer_id', $transaction->customer_id) == $item->id)
                                        selected
                                    @endif>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Produk <span class="text-danger">*</span></label>
                            <select name="product_id" class="form-control" required>
                                <option value="">Pilih Produk</option>
                                @foreach ($products as $item)
                                    <option value="{{ $item->id }}" @if (old('product_id', $transaction->items[0]->product_id) == $item->id)
                                        selected
                                    @endif>{{ $item->name }} | {{ $item->sell_price_idr }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Beli (Quantity) <span class="text-danger">*</span></label>
                            <input type="text" name="quantity" class="form-control" value="{{ old('quantity', $transaction->items[0]->quantity) }}" autocomplete="off" required />
                        </div>
                        <div class="form-group">
                            <label>Diskon (dalam persentase)</label>
                            <input type="text" name="discount" class="form-control" value="{{ old('discount', $transaction->items[0]->discount) }}" autocomplete="off" />
                            <small>*tulis angka persentase 0-100</small>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Ubah Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
