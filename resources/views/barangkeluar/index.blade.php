@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-body">
                <div class="card">
                    <div class="card-header">Data Barang Keluar
                        <a href="exportexcel" class="float-right btn btn-secondary btn-floating"> Export </a>
                        <a href="{{ route('barangkeluar.create') }}" class="float-right btn btn-secondary btn-floating"> Tambah Data</a>
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
                                                    <th>Nama Pembeli</th>
                                                    <th>Tanggal Pembelian</th>
                                                    <th>Size S</th>
                                                    <th>Size M</th>
                                                    <th>Size L</th>
                                                    <th>Size XL</th>
                                                    <th>Size XXL</th>
                                                    <th>Jumlah</th>
                                                    <th style="width: 15%">Harga</th>
                                                    <th style="width: 15%">Total</th>
                                                    <th style="width: 25%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 1; @endphp
                                                @foreach($Keluar as $data)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $data->barang->nama_barang }}</td>
                                                    <td>{{ $data->nama_pembeli }}</td>
                                                    <td>{{ $data->tanggal_pembelian }}</td>
                                                    <td>{{ $data->size_s }}</td>
                                                    <td>{{ $data->size_m }}</td>
                                                    <td>{{ $data->size_l }}</td>
                                                    <td>{{ $data->size_xl }}</td>
                                                    <td>{{ $data->size_xxl }}</td>  
                                                    <td>{{ $data->jumlah }}</td>
                                                    <td>Rp. {{ number_format($data->harga) }}</td>
                                                    <td>Rp. {{ number_format($data->total) }}</td>
                                                    <td>
                                                    <a href="{{ route('barangkeluar.edit',$data->id) }}" class="btn btn-primary">Edit</a>
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
    @include('sweetalert::alert')
@endsection

<!-- https://www.positronx.io/laravel-datatables-example/ -->