@extends('layouts.frontend')
@section('title','Tiket')
@section('content')
<section class="text-gray-600 body-font relative">
    <div class="container px-5 py-8 mx-auto">
        <div id="not" style="display: none" class="text-sm text-white bg-blue-900 border border-blue-800 h-12 flex items-center p-4 rounded-sm relative" role="alert">
            <strong class="mr-1">Kendala tidak ditemukan</strong>
            <button type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
                <span class="absolute top-0 bottom-0 right-5 text-2xl px-3 py-1 hover:text-blue-500" aria-hidden="true" >×</span>
            </button>
        </div>
        <div id="found" style="display: none" class="text-sm text-white bg-blue-900 border border-blue-800 h-12 flex items-center p-4 rounded-sm relative" role="alert">
            <strong class="mr-1">Kendala ditemukan</strong>
            <button type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
                <span class="absolute top-0 bottom-0 right-5 text-2xl px-3 py-1 hover:text-blue-500" aria-hidden="true" >×</span>
            </button>
        </div>
      <div class="flex flex-col text-center w-full mb-12">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Cek Kendala</h1>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Masukkan kode kendal yang sudah didapat ketika mengirim kendala</p>
      </div>
      <form id="form-check" action="{{route('cek_tikets')}}" method="POST">
        @csrf
        <div class="lg:w-1/2 md:w-2/3 mx-auto">
          <div class="flex flex-wrap -m-2">
            <div class="p-2 w-full">
              <div class="relative">
                  <label for="kode" class="leading-7 text-sm text-gray-600">Kode Kendala</label>
                  <input type="text" id="kode" required name="kode" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
            </div>
            <div class="p-2 w-full">
              <button type="submit" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Cek</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>
  <div style="display: none" id="detail">

  </div>
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