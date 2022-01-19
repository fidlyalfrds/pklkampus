@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-body">
                <div class="card">
                    <div class="card-header">Data Stock Barang
                        <a href="exportbarang" class="float-right btn btn-secondary btn-floating"> Export </a>
                        <!-- <a href="{{ route('barang.create') }}" class="float-right btn btn-secondary btn-floating"> Tambah Data</a> -->
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
                                                    <th>Nama Barang</th>
                                                    <th style="width: 15%">Harga</th>
                                                    <th>Size S</th>
                                                    <th>Size M</th>
                                                    <th>Size L</th>
                                                    <th>Size XL</th>
                                                    <th>Size XXL</th>
                                                    <th>Total Stock</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 1; @endphp
                                                @foreach($Barang as $data)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $data->nama_barang }}</td>
                                                    <td>Rp. {{ number_format($data->harga) }}</td>
                                                    <td>{{ $data->size_s }}</td>
                                                    <td>{{ $data->size_m }}</td>
                                                    <td>{{ $data->size_l }}</td>
                                                    <td>{{ $data->size_xl }}</td>
                                                    <td>{{ $data->size_xxl }}</td>
                                                    <td>{{ $data->total_stock }}</td>
                                                    <td>
                                                    <!-- <form action="{{ route('barang.destroy', $data->id) }}"method="POST">
                                                    @csrf @method('delete') -->
                                                    <a href="{{ route('barang.edit',$data->id) }}" class="btn btn-primary">Edit</a>
                                                    <!-- <button type="submit" class="btn btn-danger">Delete</button> -->
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
            <form action="{{route('barang.store')}}" method="post">
                @csrf
            <div class="modal-body">
                <div class="form-group {{ $errors->has('nama_barang') ? ' has-error' : '' }}">
                        <label class="control-label">Nama Barang</label>    
                        <input type="text" name="nama_barang" class="form-control" required>
                        @if ($errors->has('nama_barang'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_barang') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('harga') ? ' has-error' : '' }}">
                        <label class="control-label">Harga</label>  
                        <input type="number" name="harga" class="form-control" required>
                        @if ($errors->has('harga'))
                            <span class="help-block">
                                <strong>{{ $errors->first('harga') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('size_s') ? ' has-error' : '' }}">
                        <label class="control-label">size_s</label> 
                        <input type="number" name="size_s" class="form-control" required>
                        @if ($errors->has('size_s'))
                            <span class="help-block">
                                <strong>{{ $errors->first('size_s') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('size_m') ? ' has-error' : '' }}">
                        <label class="control-label">size_m</label> 
                        <input type="number" name="size_m" class="form-control" required>
                        @if ($errors->has('size_m'))
                            <span class="help-block">
                                <strong>{{ $errors->first('size_m') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('size_l') ? ' has-error' : '' }}">
                        <label class="control-label">size_l</label> 
                        <input type="number" name="size_l" class="form-control" required>
                        @if ($errors->has('size_l'))
                            <span class="help-block">
                                <strong>{{ $errors->first('size_l') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('size_xl') ? ' has-error' : '' }}">
                        <label class="control-label">size_xl</label>    
                        <input type="number" name="size_xl" class="form-control" required>
                        @if ($errors->has('size_xl'))
                            <span class="help-block">
                                <strong>{{ $errors->first('size_xl') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('size_xxl') ? ' has-error' : '' }}">
                        <label class="control-label">size_xxl</label>   
                        <input type="number" name="size_xxl" class="form-control" required>
                        @if ($errors->has('size_xxl'))
                            <span class="help-block">
                                <strong>{{ $errors->first('size_xxl') }}</strong>
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

<!-- <script type="text/javascript">
$('#sweetalert_demo_9').on('click', function(e) {
      swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false,
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          swal(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )
          $(`#delete${id}`).submit();
        } else if (
          // Read more about handling dismissals
          result.dismiss === swal.DismissReason.cancel
        ) {
          swal(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
          )
        }
      })
    });
</script> -->

<!-- https://www.positronx.io/laravel-datatables-example/ -->