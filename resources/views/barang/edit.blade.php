@extends('layouts.admin')
@section('content')

<section class="page-content container-fluid">
<div class="row">
	<div class="col-md-12">
		<div class="card"><br><a href="{{ url()->previous() }}">&nbsp;&nbsp;&nbsp;&nbsp;Kembali</a>
			<h5 class="card-header">Edit Data Barang</h5>
			<form action="{{ route('barang.update',$Barang->id) }}" method="post">
				{{ csrf_field() }}
				<div class="card-body">

			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}<br>
        			<input type="hidden" name="id" value="{{ request()->get('id') }}">

			  		<div class="form-group {{ $errors->has('nama_barang') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Barang</label>	
			  			<input type="text" name="nama_barang" class="form-control" value="{{ $Barang->nama_barang }}"  required>
			  			@if ($errors->has('nama_barang'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_barang') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('harga') ? ' has-error' : '' }}">
			  			<label class="control-label">Harga</label>	
			  			<input type="text" name="harga" class="form-control" value="{{ $Barang->harga }}"  required>
			  			@if ($errors->has('harga'))
                            <span class="help-block">
                                <strong>{{ $errors->first('harga') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<!-- <div class="form-group {{ $errors->has('size_s') ? ' has-error' : '' }}">
			  			<label class="control-label">size_s</label>	
			  			<input type="text" name="size_s" class="form-control" value="{{ $Barang->size_s }}"  required>
			  			@if ($errors->has('size_s'))
                            <span class="help-block">
                                <strong>{{ $errors->first('size_s') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('size_m') ? ' has-error' : '' }}">
			  			<label class="control-label">size_m</label>	
			  			<input type="text" name="size_m" class="form-control" value="{{ $Barang->size_m }}"  required>
			  			@if ($errors->has('size_m'))
                            <span class="help-block">
                                <strong>{{ $errors->first('size_m') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('size_l') ? ' has-error' : '' }}">
			  			<label class="control-label">size_l</label>	
			  			<input type="text" name="size_l" class="form-control" value="{{ $Barang->size_l }}"  required>
			  			@if ($errors->has('size_l'))
                            <span class="help-block">
                                <strong>{{ $errors->first('size_l') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('size_xl') ? ' has-error' : '' }}">
			  			<label class="control-label">size_xl</label>	
			  			<input type="text" name="size_xl" class="form-control" value="{{ $Barang->size_xl }}"  required>
			  			@if ($errors->has('size_xl'))
                            <span class="help-block">
                                <strong>{{ $errors->first('size_xl') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('size_xxl') ? ' has-error' : '' }}">
			  			<label class="control-label">size_xxl</label>	
			  			<input type="text" name="size_xxl" class="form-control" value="{{ $Barang->size_xxl }}"  required>
			  			@if ($errors->has('size_xxl'))
                            <span class="help-block">
                                <strong>{{ $errors->first('size_xxl') }}</strong>
                            </span>
                        @endif
			  		</div> -->

			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Selesai</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
</section>
@endsection