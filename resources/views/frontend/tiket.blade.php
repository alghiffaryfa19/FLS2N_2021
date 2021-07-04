@extends('layouts.frontend')
@section('title','Kendala')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h1 class="title-section">Kendala</h1>
            </div>
        </div>
        @if(session('berhasil'))
        <div class="alert alert-success" role="alert">
          <h4 class="alert-heading">Berhasil!</h4>
          <p>Simpan kode {{ session()->get( 'berhasil' ) }} untuk cek kendala yang sudah dikirimkan, kode hanya muncul sekali. Mohon menunggu balasan dari narahubung</p>
          <hr>
          <p class="mb-0">Untuk cek kendala, silahkan masuk ke <a href="{{route('cek_tiket')}}">Cek Kendala</a> dengan memasukkan kode {{ session()->get( 'berhasil' ) }}</p>
        </div>
        @endif
        <div class="row">
            <div class="col-md-12 ">
                <form action="{{route('add_tiket')}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" required name="nama" id="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nisn">NISN</label>
                        <input type="text" required name="nisn" id="nisn" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="wa">WhatsApp</label>
                        <input type="text" required name="wa" id="wa" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul Kendala</label>
                        <input type="text" required name="judul" id="judul" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="bidang_id">Bidang</label>
                      <select class="form-control" required id="bidang_id" name="bidang_id">
                        @foreach ($bidang as $item)
                            <option value="{{$item->id}}">{{$item->nama_bidang}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="detail">Detail Kendala</label>
                      <textarea name="detail" class="form-control" id="detail"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                  </form>
            </div>
        </div>
    </div>
</section>
@endsection