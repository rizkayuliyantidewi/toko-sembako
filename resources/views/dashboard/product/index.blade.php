@extends('layouts.app')

@section('content')
<div class="container">
    @include('shared.components.alert')
    <div class="row justify-content-center mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Daftar Produk
                </div>
                <div class="card-body">
                    <a href="{{ route('dashboard.products.create') }}" class="btn btn-primary">Tambah Data</a>
                    <table class="table table-responsive mt-3 w-100 d-block d-md-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Foto</th>    
                                <th scope="col">Harga Beli</th>    
                                <th scope="col">Harga Jual</th>    
                                <th scope="col" width="10%">&nbsp;</th>    
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration + $products->firstItem() - 1 }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td><span class="badge badge-primary">{{ $item->category->name }}</span></td>
                                    <td><a href="{{ $item->product_image }}" target="_blank"><img src="{{ $item->product_image }}" alt="Foto Produk" width="72" height="72"></a></td>
                                    <td>{{ $item->buy_price_idr }}</td>
                                    <td>{{ $item->sell_price_idr }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              Aksi
                                            </button>
                                            <div class="dropdown-menu">
                                              <a class="dropdown-item" href="{{ route('dashboard.products.edit', ['product' => $item]) }}">Ubah Data</a>
                                              <a class="dropdown-item" href="javascript:void(0)" onclick="deleteData('{{ $item->id }}')" data-toggle="modal" data-target="#deleteModal">Hapus Data</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Data produk tidak ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@include('shared.components.delete_confirmation.modal')
@include('shared.components.delete_confirmation.script', ['routeName' => 'dashboard.products.destroy'])
@endsection