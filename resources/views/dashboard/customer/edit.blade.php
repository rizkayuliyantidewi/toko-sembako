@extends('layouts.app')

@section('content')
<div class="container">
    @include('shared.components.alert')
    <div class="row justify-content-center mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Ubah Data Pelanggan
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.customers.update', ['customer' => $customer]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nama Pelanggan <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $customer->name) }}" autocomplete="off" required />
                        </div>
                        <div class="form-group">
                            <label>No Handphone <span class="text-danger">*</span></label>
                            <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number', $customer->phone_number) }}" autocomplete="off" required />
                        </div>
                        <div class="form-group">
                            <label>Alamat Lengkap <span class="text-danger">*</span></label>
                            <textarea name="address" class="form-control" rows="5" style="resize: none;">{!! old('address',$customer->address) !!}</textarea>
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
