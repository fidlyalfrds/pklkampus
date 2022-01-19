@extends('layouts.admin')
@section('content')

<section class="page-content container-fluid">
<div class="row">
	<div class="col-md-12">
		<div class="card"><br><a href="{{ url()->previous() }}">&nbsp;&nbsp;&nbsp;&nbsp;Kembali</a>
			<h5 class="card-header"><b>Tambah Data Pre Order</b></h5>
			<form action="{{ route('preorder.store') }}" method="post">
				{{ csrf_field() }}
				<div class="card-body">

			  		<div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama</label>	
			  			<input type="text" name="nama" class="form-control"  required>
			  			@if ($errors->has('nama'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('nama_barang') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Barang</label>	
			  			<input type="text" name="nama_barang" class="form-control"  required>
			  			@if ($errors->has('nama_barang'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_barang') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('telp') ? ' has-error' : '' }}">
			  			<label class="control-label">No Telp</label>	
			  			<input type="number" name="telp" class="form-control"  required>
			  			@if ($errors->has('telp'))
                            <span class="help-block">
                                <strong>{{ $errors->first('telp') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('alamat') ? ' has-error' : '' }}">
		              <label class="control-label">Alamat</label>  
		              <textarea type="text" name="alamat" class="form-control"  required>
		              	@if ($errors->has('alamat'))
		                    <span class="help-block">
		                        <strong>{{ $errors->first('alamat') }}</strong>
		                    </span>
		                @endif
		                </textarea>
		            </div>

			  		<div class="form-group {{ $errors->has('tanggal_pemesanan') ? ' has-error' : '' }}">
			  			<label class="control-label">Tanggal Pemesanan</label>	
			  			<input type="date" name="tanggal_pemesanan" class="form-control"  required>
			  			@if ($errors->has('tanggal_pemesanan'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tanggal_pemesanan') }}</strong>
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

			  		<div class="form-group {{ $errors->has('deksripsi') ? ' has-error' : '' }}">
              			<label class="control-label">Deskripsi</label>  
              				<textarea type="text" name="deksripsi" class="form-control"  required>
              			@if ($errors->has('deksripsi'))
                            <span class="help-block">
                                <strong>{{ $errors->first('deksripsi') }}</strong>
                            </span>
                        @endif
                    		</textarea>
            		</div>

            		<div class="form-group {{ $errors->has('jumlah_bayar') ? ' has-error' : '' }}">
			  			<label class="control-label">Jumlah Yang Di Bayar</label>	
			  			<input type="number" name="jumlah_bayar" class="form-control"  required>
			  			@if ($errors->has('jumlah_bayar'))
                            <span class="help-block">
                                <strong>{{ $errors->first('jumlah_bayar') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		
			  		<div class="form-group">
			  			<button type="button submit" class="btn btn-primary btn-rounded btn-floating">Simpan</button>
			  			<button type="button" class="btn btn-secondary btn-rounded btn-floating clear-form">Clear</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
</section>
@endsection