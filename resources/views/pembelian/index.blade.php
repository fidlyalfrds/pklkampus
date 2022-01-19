@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-body">
                <div class="card">
                    <div class="card-header">Data Pembelian
                        <a href="export" class="float-right btn btn-secondary btn-floating"> Export </a>
                        <!-- <a href="{{ route('pembelian.create') }}" class="float-right btn btn-secondary btn-floating"> Tambah Data</a> -->
                        <button type="button" class="float-right btn btn-secondary btn-floating" data-toggle="modal" data-target="#exampleModalCenter">Tambah Data</button>
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
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalTitle1">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="zmdi zmdi-close"></span>
                </button>
            </div>
            <form action="{{route('pembelian.store')}}" method="post">
                @csrf
            <div class="modal-body">
                <div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" required>
                        @if ($errors->has('nama'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('jumlah') ? ' has-error' : '' }}">
                        <label class="control-label">Jumlah</label> 
                        <input type="number" name="jumlah" class="form-control"  required>
                        @if ($errors->has('jumlah'))
                            <span class="help-block">
                                <strong>{{ $errors->first('jumlah') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('harga') ? ' has-error' : '' }}">
                        <label class="control-label">Harga</label>  
                        <input type="number" name="harga" class="form-control"  required>
                        @if ($errors->has('harga'))
                            <span class="help-block">
                                <strong>{{ $errors->first('harga') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('tanggal_beli') ? ' has-error' : '' }}">
                        <label class="control-label">Tanggal Pembelian</label>  
                        <input type="date" name="tanggal_beli" class="form-control"  required>
                        @if ($errors->has('tanggal_beli'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tanggal_beli') }}</strong>
                            </span>
                        @endif
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-outline" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection

<!-- https://www.positronx.io/laravel-datatables-example/ -->