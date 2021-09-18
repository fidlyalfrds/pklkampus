@extends('layouts.admin')
@section('content')

<section class="page-content container-fluid">
<div class="row">
	<div class="col-md-12">
		<div class="card"><br><a href="{{ url()->previous() }}">&nbsp;&nbsp;&nbsp;&nbsp;Kembali</a>
			<h5 class="card-header"><b>Tambah Data Reseller</b></h5>
			<form action="{{ route('reseller.store') }}" method="post">
				{{ csrf_field() }}
				<div class="card-body">

					<div class="form-group {{ $errors->has('nama_reseller') ? ' has-error' : '' }}">
						<label>Nama Reseller</label>
						<input type="text" class="form-control" name="nama_reseller" required>
						@if ($errors->has('nama_reseller'))
							<span class="help-block">
                                <strong>{{ $errors->first('nama_reseller') }}</strong>
                            </span>
                        @endif
					</div>

			  		<div class="form-group {{ $errors->has('barang_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Barang</label>	
			  			<select name="barang_id" class="form-control required" required>
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

			  		<div class="form-group {{ $errors->has('stock_awal') ? ' has-error' : '' }}">
			  			<label class="control-label">stock awal</label>	
			  			<input type="number" name="stock_awal" class="form-control"  required>
			  			@if ($errors->has('stock_awal'))
                            <span class="help-block">
                                <strong>{{ $errors->first('stock_awal') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('terjual') ? ' has-error' : '' }}">
			  			<label class="control-label">Terjual</label>	
			  			<input type="number" name="terjual" class="form-control"  required>
			  			@if ($errors->has('terjual'))
                            <span class="help-block">
                                <strong>{{ $errors->first('terjual') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		
			  		<div class="form-group">
			  			<button type="button submit" class="btn btn-primary btn-rounded btn-floating" id="sweetalert_demo_6">Simpan</button>
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