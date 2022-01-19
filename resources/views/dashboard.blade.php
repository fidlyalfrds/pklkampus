@extends('layouts.admin') 
@section('content')
<section class="page-content container-fluid">
<div class="row">
    <div class="col-12">
    @if(session()->has('pesan'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{session('pesan')}}</strong> <a href="#" class="alert-link"></a>.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true" class="la la-close"></span>
                            </button>
                        </div>
                    @endif
        <div class="card">
            <div class="row m-0 col-border-xl">
                <div class="col-md-12 col-lg-6 col-xl-4">
                    <div class="card-body">
                        <div class="icon-rounded icon-rounded-success float-left m-r-20">
                            <i class="la la-plus f-w-600"></i>
                        </div>
                        <h5 class="card-title m-b-5 counter" data-count="{{$masuk}}">0</h5>
                        <h6 class="text-muted m-t-10">Data Barang Masuk</h6>
                        <div class="progress progress-active-sessions mt-4" style="height:7px;">
                            {{$masuk}}
                        </div>
                        <small class="text-muted float-left m-t-5 mb-3">Barang Masuk</small>
                        <small class="text-muted float-right m-t-5 mb-3 counter" data-count="{{$masuk}}">0</small>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-4">
                    <div class="card-body">
                        <div class="icon-rounded icon-rounded-info float-left m-r-20">
                            <i class="icon dripicons-to-do"></i>
                        </div>
                        <h5 class="card-title m-b-5 counter" data-count="{{$barang}}">0</h5>
                        <h6 class="text-muted m-t-10">Data Barang</h6>
                        <div class="progress progress-add-to-cart mt-4" style="height:7px;">
                            {{$barang}}
                        </div>
                        <small class="text-muted float-left m-t-5 mb-3"> Barang</small>
                        <small class="text-muted float-right m-t-5 mb-3 counter" data-count="{{$barang}}">{{$barang}}</small>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-4">
                    <div class="card-body">
                        <div class="icon-rounded icon-rounded-success float-left m-r-20">
                            <i class="la la-money"></i>
                        </div>
                        <h5 class="card-title m-b-5 counter" data-count="{{$keluar}}">0</h5>
                        <h6 class="text-muted m-t-10">Data Barang Keluar</h6>
                        <div class="progress progress-add-to-cart mt-4" style="height:7px;">
                            {{$keluar}}
                        </div>
                        <small class="text-muted float-left m-t-5 mb-3"> Barang Keluar</small>
                        <small class="text-muted float-right m-t-5 mb-3 counter" data-count="{{$keluar}}">{{$keluar}}</small>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="row m-0 col-border-xl">
                <div class="col-md-12 col-lg-6 col-xl-4">
                    <div class="card-body">
                        <div class="icon-rounded icon-rounded-accent float-left m-r-20">
                            <i class="icon dripicons-cart f-w-600"></i>
                        </div>
                        <h5 class="card-title m-b-5 counter" data-count="{{$pembelian}}">0</h5>
                        <h6 class="text-muted m-t-10">Data Pembelian</h6>
                        <div class="progress progress-active-sessions mt-4" style="height:7px;">
                            {{$pembelian}}
                        </div>
                        <small class="text-muted float-left m-t-5 mb-3"> Pembelian</small>
                        <small class="text-muted float-right m-t-5 mb-3 counter" data-count="{{$pembelian}}">0</small>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-4">
                    <div class="card-body">
                        <div class="icon-rounded icon-rounded-info float-left m-r-20">
                            <i class="la la-bookmark f-w-600"></i>
                        </div>
                        <h5 class="card-title m-b-5 counter" data-count="{{$po}}"></h5>
                        <h6 class="text-muted m-t-10">Data Pre-Order</h6>
                        <div class="progress progress-total-revenue mt-4" style="height:7px;">
                            {{$po}}
                        </div>
                        <small class="text-muted float-left m-t-5 mb-3"> Pre-Order</small>
                        <small class="text-muted float-right m-t-5 mb-3 counter" data-count="{{$po}}">{{$po}}</small>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-4">
                    <div class="card-body">
                        <div class="icon-rounded icon-rounded-primary float-left m-r-20">
                            <i class="la la-male f-w-600"></i>
                        </div>
                        <h5 class="card-title m-b-5 counter" data-count="{{$resel}}">0</h5>
                        <h6 class="text-muted m-t-10">Data Reseller</h6>
                        <div class="progress progress-active-sessions mt-4" style="height:7px;">
                            {{$resel}}
                        </div>
                        <small class="text-muted float-left m-t-5 mb-3">Reseller</small>
                        <small class="text-muted float-right m-t-5 mb-3 counter" data-count="{{$resel}}">0</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection