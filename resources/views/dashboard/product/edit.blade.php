@extends('layouts.app')

@section('content')
<div class="container">
    @include('shared.components.alert')
    <div class="row justify-content-center mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Ubah Data Produk
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.products.update', ['product' => $product]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nama Produk</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" autocomplete="off" />
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="product_category_id" class="form-control">
                                <option value="">Pilih Kategori</option>
                                @foreach ($productCategories as $item)
                                    <option value="{{ $item->id }}" @if (old('product_category_id', $product->product_category_id) == $item->id)
                                        selected
                                    @endif>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Produk</label>
                            <textarea name="description" class="form-control" rows="10" style="resize: none;">{!! old('description', strip_tags($product->description)) !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Harga Beli</label>
                            <input type="text" name="buy_price" value="{{ old('buy_price', $product->buy_price) }}" class="form-control" autocomplete="off" />
                        </div>
                        <div class="form-group">
                            <label>Harga Jual</label>
                            <input type="text" name="sell_price" value="{{ old('sell_price', $product->sell_price) }}" class="form-control" autocomplete="off" />
                        </div>
                        <div class="form-group">
                            <label>Foto Produk</label>
                            <input type="file" class="form-control" name="file"/>
                            @if ($product->product_image)
                                <img src="{{ $product->product_image }}" class="img-responsive mt-3" />
                            @endif
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
