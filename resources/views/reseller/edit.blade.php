@extends('layouts.admin')
@section('content')
<section class="page-content container-fluid">
<div class="row">
	<div class="col-md-12">
		<div class="card"><br><a href="{{ url()->previous() }}">&nbsp;&nbsp;&nbsp;&nbsp;Kembali</a>
			<h5 class="card-header"><b>Edit Data Pembelian</b></h5>
			<form action="{{ route('reseller.update',$Reseller->id) }}" method="post">
				{{ csrf_field() }}
				<div class="card-body">

			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
        			<input type="hidden" name="id" value="{{ request()->get('id') }}">

			  		<div class="form-group {{ $errors->has('nama_reseller') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Reseller</label>	
			  			<input type="text" name="nama_reseller" class="form-control" value="{{ $Reseller->nama_reseller }}"  required>
			  			@if ($errors->has('nama_reseller'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_reseller') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('barang_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Barang</label>	
			  			<select type="text" name="barang_id" class="form-control"  value="{{ $Reseller->barang_id}}"  required>
			  				<option>-Barang-</option>
			  					@foreach($Barang as $data)
			  				<option value="{{ $data->id }}">{{ $data->nama_barang}}</option>
			  					@endforeach
			  			</select>
			  			@if ($errors->has('barang_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('barang_id') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('stock_awal') ? ' has-error' : '' }}">
			  			<label class="control-label">stock_awal</label>	
			  			<input type="number" name="stock_awal" class="form-control" value="{{ $Reseller->stock_awal }}"  required>
			  			@if ($errors->has('stock_awal'))
                            <span class="help-block">
                                <strong>{{ $errors->first('stock_awal') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('terjual') ? ' has-error' : '' }}">
			  			<label class="control-label">Terjual</label>	
			  			<input type="number" name="terjual" class="form-control" value="{{ $Reseller->terjual }}"  required>
			  			@if ($errors->has('terjual'))
                            <span class="help-block">
                                <strong>{{ $errors->first('terjual') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary" id="sweetalert_demo_6">Selesai</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
</section>
@endsection