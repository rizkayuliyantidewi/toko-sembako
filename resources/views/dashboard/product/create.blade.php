@extends('layouts.app')

@section('content')
<div class="container">
    @include('shared.components.alert')
    <div class="row justify-content-center mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Tambah Data Produk
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Nama Produk <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" autocomplete="off" required />
                        </div>
                        <div class="form-group">
                            <label>Kategori <span class="text-danger">*</span></label>
                            <select name="product_category_id" class="form-control" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($productCategories as $item)
                                    <option value="{{ $item->id }}" @if (old('product_category_id') == $item->id)
                                        selected
                                    @endif>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Produk <span class="text-danger">*</span></label>
                            <textarea name="description" class="form-control" rows="10" style="resize: none;">{!! old('description') !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Harga Beli <span class="text-danger">*</span></label>
                            <input type="text" name="buy_price" value="{{ old('buy_price') }}" required class="form-control" autocomplete="off" />
                        </div>
                        <div class="form-group">
                            <label>Harga Jual <span class="text-danger">*</span></label>
                            <input type="text" name="sell_price" value="{{ old('sell_price') }}" required class="form-control" autocomplete="off" />
                        </div>
                        <div class="form-group">
                            <label>Foto Produk <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="file" required/>
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
