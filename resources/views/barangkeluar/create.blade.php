@extends('layouts.admin')
@section('content')

<section class="page-content container-fluid">
<div class="row">
	<div class="col-md-12">
		<div class="card"><br><a href="{{ url()->previous() }}">&nbsp;&nbsp;&nbsp;&nbsp;Kembali</a>
			<h5 class="card-header">Tambah Data Barang Keluar</h5>
			<form action="{{ route('barangkeluar.store') }}" method="post">
				{{ csrf_field() }}
				<div class="card-body">

			  		<div class="form-group {{ $errors->has('barang_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Barang</label>	
			  			<select name="barang_id" class="form-control">
						  <option>---</option>
							@foreach($Barang as $data)
			  				<option value="{{ $data->id }}">{{ $data->nama_barang }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('barang_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('barang_id') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('nama_pembeli') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Pembeli</label>	
			  			<input type="text" name="nama_pembeli" class="form-control"  required>
			  			@if ($errors->has('nama_pembeli'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_pembeli') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('tanggal_pembelian') ? ' has-error' : '' }}">
			  			<label class="control-label">Tanggal Pembelian</label>	
			  			<input type="date" name="tanggal_pembelian" class="form-control"  required>
			  			@if ($errors->has('tanggal_pembelian'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tanggal_pembelian') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('size_s') ? ' has-error' : '' }}">
			  			<label class="control-label">size_s</label>	
			  			<input type="number" name="size_s" class="form-control"  required>
			  			@if ($errors->has('size_s'))
                            <span class="help-block">
                                <strong>{{ $errors->first('size_s') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('size_m') ? ' has-error' : '' }}">
			  			<label class="control-label">size_m</label>	
			  			<input type="number" name="size_m" class="form-control"  required>
			  			@if ($errors->has('size_m'))
                            <span class="help-block">
                                <strong>{{ $errors->first('size_m') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('size_l') ? ' has-error' : '' }}">
			  			<label class="control-label">size_l</label>	
			  			<input type="number" name="size_l" class="form-control"  required>
			  			@if ($errors->has('size_l'))
                            <span class="help-block">
                                <strong>{{ $errors->first('size_l') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('size_xl') ? ' has-error' : '' }}">
			  			<label class="control-label">size_xl</label>	
			  			<input type="number" name="size_xl" class="form-control"  required>
			  			@if ($errors->has('size_xl'))
                            <span class="help-block">
                                <strong>{{ $errors->first('size_xl') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('size_xxl') ? ' has-error' : '' }}">
			  			<label class="control-label">size_xxl</label>	
			  			<input type="number" name="size_xxl" class="form-control"  required>
			  			@if ($errors->has('size_xxl'))
                            <span class="help-block">
                                <strong>{{ $errors->first('size_xxl') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		
			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary" id="sweetalert_demo_6">Tambah</button>
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