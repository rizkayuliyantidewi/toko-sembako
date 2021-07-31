@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('images/banners/banner-1.jpeg') }}" alt="First slide">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Sebelumnya</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Selanjutnya</span>
                </a>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <h4>Katalog Produk</h4>
        </div>
    </div>

    <div class="row equal-cols">
        @foreach ($products as $item)
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