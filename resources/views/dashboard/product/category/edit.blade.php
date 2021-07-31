@extends('layouts.app')

@section('content')
<div class="container">
    @include('shared.components.alert')
    <div class="row justify-content-center mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Ubah Kategori Produk
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.categories.update', ['category' => $productCategory]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <input type="text" name="name" value="{{ old('name', $productCategory->name) }}" class="form-control" required autocomplete="off" />
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
