@extends('layouts.masuk') 
@section('content') 
<div class="container">
        <form class="sign-in-form" action="{{route('masuk')}}" method="post">
            @csrf
            <div class="card">
                <div class="card-body">
                    <a href="index.html" class="brand text-center d-block m-b-20">
                        <img src="{{ asset('admin/assets/img/WhatsApp_Image_2021-08-31_at_12.27.13-removebg-preview.png') }}"
                        style="width: 160px; height: 80px" alt="QuantumPro Logo" />
                    </a>
                    <h5 class="sign-in-heading text-center m-b-20">Sign In</h5>
                    <div class="form-group" data-validate="Valid email is required: ex@abc.xyz">
                        <label for="email" class="sr-only">Email address</label>
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address"  value="{{ old('email') }}" autofocus required>
                    </div>

                    <div class="form-group">
                        <label for="password" class="sr-only">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="">
                    </div>

                    @if(session()->has('LoginError'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{session('LoginError')}}</strong> <a href="#" class="alert-link"></a>.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true" class="la la-close"></span>
                            </button>
                        </div>
                    @endif
                    
                    <button class="btn btn-primary btn-rounded btn-floating btn-lg btn-block" type="submit">Sign In</button>
                 <!-- <p class="text-muted m-t-25 m-b-0 p-0">Don't have an account yet?<a href="auth.register.html"> Create an account</a></p> -->
                </div>

            </div>
        </form>
    </div>
@endsection