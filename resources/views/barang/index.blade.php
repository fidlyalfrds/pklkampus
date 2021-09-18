@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-body">
                <div class="card">
                    <div class="card-header">Data Stock Barang
                        <a href="{{ route('barang.create') }}" class="float-right btn btn-secondary btn-floating"> Tambah Data</a>
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