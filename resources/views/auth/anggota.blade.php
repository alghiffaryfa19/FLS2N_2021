@extends('layouts.auth_satu')
@section('style')
    <link rel="stylesheet" href="{{asset('assets/css/loginreg.css')}}" />
@endsection
@section('content')
@if(session('nisn_not_found'))
    <div style="margin: 10px">
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Mohon Maaf Sobat Prestasi</h4>
            <p>Kombinasi NISN/Nomor Induk dan tanggal lahir sobat prestasi tidak ditemukan, mohon segera melapor ke operator dapodik sekolah, agar sobat prestasi segera bisa mendaftar ajang prestasi ini.</p>
            <hr>
            <p class="mb-0">Berikut kami sertakan <a class="text-blue-500" href="#">tautan pengurusan</a></p>
        </div>
    </div>
@endif
@if(session('kelas'))
    <div style="margin: 10px">
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Mohon Maaf Sobat Prestasi</h4>
            <p>Pada data kami, sobat prestasi masih kelas {{ session()->get( 'kelas' ) }}, ajang prestasi ini hanya diperuntukan bagi siswa Pendidikan Menengah SMA dan MA.</p>
            <hr>
            <p class="mb-0">Silahkan kunjungi <a class="text-yellow-500" target="_blank" href="https://pusatprestasinasional.kemdikbud.go.id">Portal Pusat Prestasi Nasional</a> untuk mendapatkan informasi ajang prestasi yang sesuai dengan jenjang sobat prestasi</p>
        </div>
    </div>
@endif
@if(session('salah_jenjang'))
    <div style="margin: 10px">
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Mohon Maaf Sobat Prestasi</h4>
            <p>Pada data kami, sobat prestasi merupakan siswa dari {{ session()->get( 'salah_jenjang' ) }}, ajang prestasi ini hanya diperuntukan bagi siswa SMA dan MA.</p>
            <hr>
            <p class="mb-0">Silahkan kunjungi <a class="text-yellow-500" target="_blank" href="https://pusatprestasinasional.kemdikbud.go.id">Portal Pusat Prestasi Nasional</a> untuk mendapatkan informasi ajang prestasi yang sesuai dengan jenjang sobat prestasi</p>
        </div>
    </div>
@endif
@if(session('sudah_juara'))
    <div style="margin: 10px">
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Mohon Maaf Sobat Prestasi</h4>
            <p>Pada data kami, sobat prestasi sudah pernah menjuarai FLS2N bidang {{ session()->get( 'sudah_juara' ) }}, untuk itu tidak bisa mendaftarkan lagi di bidang yang sama.</p>
        </div>
    </div>
@endif
@if(session('sudah_diisi'))
    <div style="margin: 10px">
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Mohon Maaf Sobat Prestasi</h4>
            <p>Anggota sudah diisi</p>
        </div>
    </div>
@endif
@if(session('kode'))
    <div style="margin: 10px">
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Mohon Maaf Sobat Prestasi</h4>
            <p>Kode Refferal Ketua Tidak Ditemukan</p>
        </div>
    </div>
@endif
@if(session('ketua'))
    <div style="margin: 10px">
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Mohon Maaf Sobat Prestasi</h4>
            <p>NISN yang dimasukan sudah menjadi ketua</p>
        </div>
    </div>
@endif
@if(session('bidang_mandiri'))
    <div style="margin: 10px">
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Mohon Maaf Sobat Prestasi</h4>
            <p>Bidang yang dipilih, merupakan bidang dengan jenis individu</p>
        </div>
    </div>
@endif
@if(session('data_ada'))
    <div style="margin: 10px">
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Mohon Maaf Sobat Prestasi</h4>
            <p>NISN, NIK atau Email yang Sobat Prestasi masukkan sudah terdaftar</p>
        </div>
    </div>
@endif
<div class="form-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-8 mx-auto">
                <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <div class="form-container">
                    <div class="form-icon">
                        <img src="{{asset('assets/images/registerlogin-hero.png')}}" alt="" style="display: block; width: 90%; margin: auto;" />
                        <!-- <span class="signup"><a href="">Don't have account? Signup</a></span> -->
                    </div>
                    
                    <form method="POST" class="form-horizontal login" action="{{route('daftar_anggota')}}">
                        @csrf
                        <h2 class="text-center text-primary">Daftar</h2>
                        <h6 style="margin-top: 20px" class="text-center">Silahkan mengisikan NISN dan Kode Refferal Ketua</h6>
                        <div class="form-group">
                            <input type="hidden" name="jenjang" value="{{$jenjang->id}}">
                            <input class="form-control" required type="number" name="nisn" placeholder="Masukkan NISN">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="date" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir">
                        </div>
                        <div class="form-group">
                            <input class="form-control" required type="text" name="kode" placeholder="Kode Refferal Ketua">
                        </div>
                        <button style="margin-bottom: 30px" class="btn signin">Daftar</button>
                        <a href="{{route('login')}}"><h6 class="text-center text-danger">Sudah Punya Akun ? Masuk</h6></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection