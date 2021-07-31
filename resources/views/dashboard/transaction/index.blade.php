@extends('layouts.app')

@section('content')
<div class="container">
    @include('shared.components.alert')
    <div class="row justify-content-center mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Daftar Penjualan
                </div>
                <div class="card-body">
                    <a href="{{ route('dashboard.transactions.create') }}" class="btn btn-primary">Tambah Data</a>
                    <table class="table table-responsive mt-3 w-100 d-block d-md-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No Transaksi</th>
                                <th scope="col">Nama Pelanggan</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Harga Jual</th>
                                <th scope="col">Diskon</th>
                                <th scope="col">Kuantitas</th>
                                <th scope="col">Harga Akhir</th>
                                <th scope="col" width="15%">&nbsp;</th>    
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactions as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration + $transactions->firstItem() - 1}}</th>
                                    <td>{{ $item->transaction_number }}</td>
                                    <td>{{ $item->customer->name }}</td>
                                    <td>{{ $item->items[0]->product->name }}</td>
                                    <td>{{ $item->items[0]->sell_price_idr }}</td>
                                    <td>{{ $item->items[0]->discount_percentage }}</td>
                                    <td>{{ $item->items[0]->quantity }}</td>
                                    <td>{{ $item->items[0]->final_price_idr }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              Aksi
                                            </button>
                                            <div class="dropdown-menu">
                                              <a class="dropdown-item" href="{{ route('dashboard.transactions.edit', ['transaction' => $item]) }}">Ubah Data</a>
                                              <a class="dropdown-item" href="javascript:void(0)" onclick="deleteData('{{ $item->id }}')" data-toggle="modal" data-target="#deleteModal">Hapus Data</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">Data penjualan tidak ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $transactions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@include('shared.components.delete_confirmation.modal')
@include('shared.components.delete_confirmation.script', ['routeName' => 'dashboard.transactions.destroy'])
@endsection