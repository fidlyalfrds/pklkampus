@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-body">
                <div class="card">
                    <div class="card-header">Data Pre Order
                        <a href="export-excel" class="float-right btn btn-secondary btn-floating"> Export </a>
                        <a href="{{ route('preorder.create') }}" class="float-right btn btn-secondary btn-floating pr-3"> Tambah Data </a>
                    </div>
                        <div class="row">
                             <div class="col-md-12">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="bs4-table" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Nama Barang</th>
                                                    <th>Jumlah</th>
                                                    <th>Harga</th>
                                                    <th>Total</th>
                                                    <th>Telah Dibayar</th>
                                                    <th>Sisa</th>
                                                    <th>Telp</th>
                                                    <th style="width: 60%;">Alamat</th>
                                                    <th style="width: 40%;">Deskripsi</th>
                                                    <th>Tanggal Pemesanan</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 1; @endphp
                                                @foreach($Preorder as $data)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $data->nama }}</td>
                                                    <td>{{ $data->nama_barang }}</td>
                                                    <td>{{ $data->jumlah }}</td>
                                                    <td>Rp. {{ number_format($data->harga) }}</td>
                                                    <td>Rp. {{ number_format($data->total) }}</td>
                                                    <td>Rp. {{ number_format($data->jumlah_bayar) }}</td>
                                                    <td>Rp. {{ number_format($data->sisa) }}</td>
                                                    <td>{{ $data->telp }}</td>
                                                    <td>{!! $data->alamat !!}</td>
                                                    <td>{!! $data->deksripsi !!}</td>
                                                    <td>{{ $data->tanggal_pemesanan }}</td>
                                                    <td>
                                                    <form action="{{ route('preorder.destroy', $data->id) }}"method="POST">
                                                    @csrf @method('delete')
                                                    <a href="{{ route('preorder.edit',$data->id) }}" class="btn btn-primary">Edit</a>
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Ingin Menghapus Data?')">Delete</button>
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
    @include('sweetalert::alert')
@endsection

<!-- https://www.positronx.io/laravel-datatables-example/ -->