@extends('layouts.admin')
@section('content')

<section class="page-content container-fluid">
<div class="row">
	<div class="col-md-12">
		<div class="card"><br><a href="{{ url()->previous() }}">&nbsp;&nbsp;&nbsp;&nbsp;Kembali</a>
			<h5 class="card-header">Tambah Data Barang</h5>
			<form action="{{ route('barang.store') }}" method="post">
				{{ csrf_field() }}
				<div class="card-body">

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