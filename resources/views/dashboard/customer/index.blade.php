@extends('layouts.app')

@section('content')
<div class="container">
    @include('shared.components.alert')
    <div class="row justify-content-center mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Daftar Pelanggan
                </div>
                <div class="card-body">
                    <a href="{{ route('dashboard.customers.create') }}" class="btn btn-primary">Tambah Data</a>
                    <table class="table table-responsive mt-3 w-100 d-block d-md-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Pelanggan</th>
                                <th scope="col">No Handphone</th>
                                <th scope="col">Alamat</th>
                                <th scope="col" width="30%">&nbsp;</th>    
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($customers as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration + $customers->firstItem() - 1}}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->phone_number }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>
                                        <a href="{{ route('dashboard.customers.edit', ['customer' => $item]) }}" class="btn btn-primary">Ubah Data</a>
                                        <a href="javascript:void(0)" onclick="deleteData('{{ $item->id }}')" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger">Hapus Data</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Data pelanggan tidak ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $customers->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@include('shared.components.delete_confirmation.modal')
@include('shared.components.delete_confirmation.script', ['routeName' => 'dashboard.customers.destroy'])
@endsection