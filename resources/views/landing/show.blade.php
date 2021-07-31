@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <img class="card-img-top" src="{{ $product->product_image }}" alt="{{ $product->product_image }}">
                <div class="card-body">
                    <h6 class="font-weight-bold">{{ $product->name }}</h6>
                    <p class="card-text">{!! $product->description !!}<p>
                    <h5>{{ $product->sell_price_idr }}</h5>
                    <span class="badge badge-primary">{{ $product->category->name }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <h4>Produk Lainnya</h4>
        </div>
    </div>

    <div class="row equal-cols">
        @foreach ($similars as $item)
            <div class="col-md-3 mt-2 mb-2">
                <div class="card">
                    <img class="card-img-top" src="{{ $item->product_image }}" alt="{{ $item->product_image }}">
                    <div class="card-body">
                        <h6 class="font-weight-bold"><a href="{{ route('landing.product.detail', ['id' => $item->id]) }}" style="color: #000;">{{ $item->name }}</a></h6>
                        <p class="card-text">{!! $item->description !!}<p>
                        <h5>{{ $item->sell_price_idr }}</h5>
                        <span class="badge badge-primary">{{ $item->category->name }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection