@extends('layouts.frontend')
@section('title','Cek Kendala')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h1 class="title-section">Cek Kendala</h1>
            </div>
        </div>
        <div id="not" style="display: none" class="alert alert-success" role="alert">
            <h4 class="alert-heading">Mohon Maaf</h4>
            <p>Kendala tidak ditemukan</p>
            <hr>
            <p class="mb-0">Untuk mengirim kendala, silahkan masuk ke <a href="{{route('tiket')}}">Kirim Kendala</a></p>
        </div>
        <div id="found" style="display: none" class="alert alert-success" role="alert">
            <h4 class="alert-heading">Kendala Ditemukan</h4>
            <p>Untuk detail silakan lihat dibawah</p>
            <hr>
            <p class="mb-0">Untuk mengirim kendala, silahkan masuk ke <a href="{{route('tiket')}}">Kirim Kendala</a></p>
        </div>
        <div class="row">
            <div class="col-md-12 ">
                <form id="form-check" action="{{route('cek_tikets')}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="kode">Kode</label>
                      <input type="text" id="kode" required name="kode" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Cek</button>
                  </form>
            </div>
        </div>
    </div>
    <div style="display: none; margin-top: 20px" class="container" id="detail">

    </div>
</section>
@endsection
@section('script')
<script type="text/javascript">
            
    $(document).ready(function() {

        $('#form-check').submit(function(e) {
            e.preventDefault();

            var form = $(this)[0];
            var datas = new FormData(form);
            var method = document.getElementById("form-check").method;
            var url = document.getElementById("form-check").action;

            $.ajax({
                url: url,
                method: method,
                data: datas,         
                cache: false,
                contentType: false,
                processData: false, 
                success: function (response) {
                    if (response == 0) {
                        document.getElementById('found').style.display = "none";
                        document.getElementById('not').style.display = "block";
                        document.getElementById('detail').style.display = "none";
                    } else {
                        document.getElementById('found').style.display = "block";
                        document.getElementById('not').style.display = "none";
                        document.getElementById('detail').style.display = "block";
                        document.getElementById('detail').innerHTML = response;

                    }
                },
                error: function (e) {
                    console.log("ERROR : ", e);
                }
            })
            
        });

    });
</script>
@endsection