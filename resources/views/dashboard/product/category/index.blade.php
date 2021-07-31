@extends('layouts.app')

@section('content')
<div class="container">
    @include('shared.components.alert')
    <div class="row justify-content-center mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Daftar Kategori Produk
                </div>
                <div class="card-body">
                    <a href="{{ route('dashboard.categories.create') }}" class="btn btn-primary">Tambah Data</a>
                    <table class="table table-responsive mt-3 w-100 d-block d-md-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Kategori</th>
                                <th scope="col">Total Produk</th>
                                <th scope="col" width="30%">&nbsp;</th>    
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($productCategories as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration + $productCategories->firstItem() - 1}}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->products->count() }}</td>
                                    <td>
                                        <a href="{{ route('dashboard.categories.edit', ['category' => $item]) }}" class="btn btn-primary">Ubah Data</a>
                                        <a href="javascript:void(0)" onclick="deleteData('{{ $item->id }}')" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger">Hapus Data</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Data kategori produk tidak ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $productCategories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@include('shared.components.delete_confirmation.modal')
@include('shared.components.delete_confirmation.script', ['routeName' => 'dashboard.categories.destroy'])
@endsection