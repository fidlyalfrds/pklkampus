@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-body">
                <div class="card">
                    <div class="card-header"><b>Data Reseller</b>
                        <a href="export" class="float-right btn btn-secondary btn-floating"> Export </a>
                        <a href="{{ route('reseller.create') }}" class="float-right btn btn-secondary btn-floating"> Tambah Data</a>
                    </div>
                        <div class="row">
                             <div class="col-md-12">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="bs4-table" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Reseller</th>
                                                    <th>Nama Barang</th>
                                                    <th>Stock Awal</th>
                                                    <th>Terjual</th>
                                                    <th>Stock Akhir</th>
                                                    <th>action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 1; @endphp
                                                @foreach($Reseller as $data)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{$data->nama_reseller}}</td>
                                                    <td>{{ $data->barang->nama_barang }}</td>
                                                    <td>{{$data->stock_awal}}</td>
                                                    <td>{{$data->terjual}}</td>
                                                    <td>{{$data->stock_akhir}}</td>
                                                    <td>
                                                    <form action="{{ route('reseller.destroy', $data->id) }}"method="POST">
                                                    @csrf @method('delete')
                                                    <a href="{{ route('reseller.edit',$data->id) }}" class="btn btn-primary">Edit</a>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- https://www.positronx.io/laravel-datatables-example/ -->