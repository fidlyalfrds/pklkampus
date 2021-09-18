@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-body">
                <div class="card">
                    <div class="card-header">Data Barang Masuk
                        <a href="exportexcel" class="float-right btn btn-secondary btn-floating"> Export </a>
                        <a href="{{ route('barangmasuk.create') }}" class="float-right btn btn-secondary btn-floating"> Tambah Data</a>
                    </div>
                        <div class="row">
                             <div class="col-md-12">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="bs4-table" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th style="width: 20%">Nama Barang</th>
                                                    <th>Tanggal Masuk</th>
                                                    <th>Size S</th>
                                                    <th>Size M</th>
                                                    <th>Size L</th>
                                                    <th>Size XL</th>
                                                    <th>Size XXL</th>
                                                    <th>Total Stock</th>
                                                    <th style="width: 25%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 1; @endphp
                                                @foreach($Masuk as $data)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $data->barang->nama_barang }}</td>
                                                    <td>{{ $data->tanggal_masuk }}</td>
                                                    <td>{{ $data->size_s }}</td>
                                                    <td>{{ $data->size_m }}</td>
                                                    <td>{{ $data->size_l }}</td>
                                                    <td>{{ $data->size_xl }}</td>
                                                    <td>{{ $data->size_xxl }}</td>  
                                                    <td>{{ $data->total_stock }}</td>
                                                    <td>
                                                    <a href="{{ route('barangmasuk.edit',$data->id) }}" class="btn btn-primary">Edit</a>
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