@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-body">
                <div class="card">
                    <div class="card-header">Data Barang Masuk
                        <a href="exportmasuk" class="float-right btn btn-secondary btn-floating"> Export </a>
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
                                                    <form action="{{ route('barangmasuk.destroy', $data->id) }}"method="POST">
                                                    @csrf @method('delete')
                                                    <!-- <a href="{{ route('barangmasuk.edit',$data->id) }}" class="btn btn-primary">Edit</a> -->
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
<!-- http://repository.unpas.ac.id/26794/8/12%20-%20Bab%204%20113040194.pdf
https://elibrary.unikom.ac.id/id/eprint/940/11/14.10113084_REDI%20ADRITO%20JUPERTA_BAB%204.pdf -->
<!-- https://elib.unikom.ac.id/files/disk1/561/jbptunikompp-gdl-selviameri-28044-9-14.uniko-v.pdf -->