@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h1>Test</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Test
                </div>
                <div class="card-body">
                    <button class="btn btn-primary">Tambah Data</button>
                    <table class="table table-responsive mt-3 w-100 d-block d-md-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>    
                                <th scope="col" width="30%">&nbsp;</th>    
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>
                                    <a href="javascript:void(0)" class="btn btn-primary">Ubah Data</a>
                                    <a href="javascript:void(0)" class="btn btn-danger">Hapus Data</a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                <td>
                                    <a href="javascript:void(0)" class="btn btn-primary">Ubah Data</a>
                                    <a href="javascript:void(0)" class="btn btn-danger">Hapus Data</a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                                <td>
                                    <a href="javascript:void(0)" class="btn btn-primary">Ubah Data</a>
                                    <a href="javascript:void(0)" class="btn btn-danger">Hapus Data</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Test
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="form-group">
                            <label>Label 1</label>
                            <input type="text" name="" class="form-control" autocomplete="off" />
                        </div>
                        <div class="form-group">
                            <label>Label 2</label>
                            <textarea name="" class="form-control" rows="10" style="resize: none;"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Label 3</label>
                            <input type="file" class="form-control" name="">
                        </div>
                        <div class="form-group">
                            <label>Label 4</label>
                            <select name="" class="form-control">
                                <option value="">Label Option</option>
                            </select>
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
