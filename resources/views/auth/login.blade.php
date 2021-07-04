@extends('layouts.auth_satu')
@section('style')
    <link rel="stylesheet" href="{{asset('assets/css/loginreg.css')}}" />
@endsection
@section('content')
<div class="form-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-8 mx-auto">
                <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                @if(session('sukses'))
                <div style="margin-bottom: 10px" class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Berhasil Mendaftar!</h4>
                    <p>Silahkan masuk dengan email akun dan kata sandi yang sudah didaftarkan</p>
                  </div>
                @endif

                @if(session('waktu_habis'))
                <div style="margin-bottom: 10px" class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Maaf Sobat Prestasi</h4>
                    <p>Waktu pendaftaran dan pengunggahan sudah ditutup pada {{ session()->get( 'waktu_habis' ) }} WIB</p>
                  </div>
                @endif
                
                <div class="form-container">
                    <div class="form-icon">
                        <img src="{{asset('assets/images/registerlogin-hero.png')}}" alt="" style="display: block; width: 90%; margin: auto;" />
                        <!-- <span class="signup"><a href="">Don't have account? Signup</a></span> -->
                    </div>
                    
                    <form method="POST" class="form-horizontal login" action="{{ route('login') }}">
                        @csrf
                        <h3 class="title">Masuk</h3>
                        <div class="form-group">
                            <span class="input-icon"><i class="fa fa-envelope"></i></span>
                            <input class="form-control" type="email" name="email" placeholder="Email (Surel)">
                        </div>
                        <div class="form-group">
                            <span class="input-icon"><i class="fa fa-lock"></i></span>
                            <input class="form-control" type="password" name="password" placeholder="Password (Kata Sandi)">
                        </div>
                        <button style="margin-bottom: 20px" class="btn signin">Login</button>
                        {{-- <span class="forgot-pass"><a href="#">Lupa kata sandi, email atau akses?</a></span> --}}
                        <a href="{{route('forgot_email')}}"><h6 class="text-center text-danger">Lupa Email</h6></a>
                        <a href="{{route('lupa_password')}}"><h6 class="text-center text-danger">Lupa Kata Sandi</h6></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection