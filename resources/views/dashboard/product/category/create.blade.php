@extends('layouts.app')

@section('content')
<div class="container">
    @include('shared.components.alert')
    <div class="row justify-content-center mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Tambah Kategori Produk
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.categories.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" required autocomplete="off" />
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
