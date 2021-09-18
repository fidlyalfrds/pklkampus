@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-body">
                <div class="card">
                    <div class="card-header">Data Pembelian
                        <a href="export" class="float-right btn btn-secondary btn-floating"> Export </a>
                        <a href="{{ route('pembelian.create') }}" class="float-right btn btn-secondary btn-floating"> Tambah Data</a>
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
                                                    <th>Jumlah</th>
                                                    <th>Harga</th>
                                                    <th>Total</th>
                                                    <th>Tanggal Pembelian</th>
                                                    <th>action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 1; @endphp
                                                @foreach($Pembelian as $data)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{$data->nama}}</td>
                                                    <td>{{$data->jumlah}}</td>
                                                    <td>Rp. {{ number_format($data->harga) }}</td>
                                                    <td>Rp. {{ number_format($data->total) }}</td>
                                                    <td>{{$data->tanggal_beli}}</td>
                                                    <td>
                                                    <form action="{{ route('pembelian.destroy', $data->id) }}"method="POST">
                                                    @csrf @method('delete')
                                                    <a href="{{ route('pembelian.edit',$data->id) }}" class="btn btn-primary">Edit</a>
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