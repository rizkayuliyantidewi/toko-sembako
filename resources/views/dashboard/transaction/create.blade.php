@extends('layouts.app')

@section('content')
<div class="container">
    @include('shared.components.alert')
    <div class="row justify-content-center mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Tambah Data Transaksi
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.transactions.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nama Pelanggan <span class="text-danger">*</span></label>
                            <select name="customer_id" class="form-control" required>
                                <option value="">Pilih Pelanggan</option>
                                @foreach ($customers as $item)
                                    <option value="{{ $item->id }}" @if (old('customer_io') == $item->id)
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
                                    <option value="{{ $item->id }}" @if (old('product_id') == $item->id)
                                        selected
                                    @endif>{{ $item->name }} | {{ $item->sell_price_idr }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Beli (Quantity) <span class="text-danger">*</span></label>
                            <input type="text" name="quantity" class="form-control" value="{{ old('quantity') }}" autocomplete="off" required />
                        </div>
                        <div class="form-group">
                            <label>Diskon (dalam persentase)</label>
                            <input type="text" name="discount" class="form-control" value="{{ old('discount') }}" autocomplete="off" />
                            <small>*tulis angka persentase 0-100</small>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Tambah Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
