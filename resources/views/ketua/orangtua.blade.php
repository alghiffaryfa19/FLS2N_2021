@extends('layouts.ketua')
@section('title','Orang Tua')
@section('content')
<div class="flex-1 flex flex-col bg-blue-50 py-4 lg:py-8 px-4 lg:px-6 xl:px-8 overflow-hidden">

    <!-- topbar -->
    <div class="max-w-screen-2xl w-full mx-auto flex justify-between">
      <div class="hidden md:block">
        <h1 class="text-2xl mb-1 font-bold text-blue-800">Orang Tua</h1>
      </div>
    </div>
    <!--/ topbar -->

    <!-- main content -->
    <div class="flex-1 py-4 lg:py-10">
      <div class="max-w-screen-2xl mx-auto">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        @if(session('sukses'))
        <div class="block text-sm text-white bg-green-500 border border-green-400 h-12 flex items-center p-4 rounded-sm relative" role="alert">
            <strong class="mr-1">Berhasil memperbarui data</strong>
            <button type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
                <span class="absolute top-0 bottom-0 right-5 text-2xl px-3 py-1 hover:text-green-100" aria-hidden="true" >×</span>
            </button>
          </div>
        @endif
        @if(session('isi'))
        <div class="block text-sm text-white bg-red-500 border border-red-400 h-12 flex items-center p-4 rounded-sm relative" role="alert">
            <strong class="mr-1">Maaf Lengkapi Data Orang Tua Dahulu</strong>
            <button type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
                <span class="absolute top-0 bottom-0 right-5 text-2xl px-3 py-1 hover:text-red-500" aria-hidden="true" >×</span>
            </button>
          </div>
        @endif
        <form id="validate_form" enctype="multipart/form-data" method="POST" action="{{route('orangtua.ketua.data')}}">
            @method('PUT')
            @csrf
            <div class="bg-white rounded-lg px-4 lg:px-8 py-4 lg:py-6 mt-8">
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="nama_ibu">
                        Nama Ibu <small class="text-red-500">*</small>
                    </label>
                    <input type="text" name="nama_ibu" value="{{$ortu->nama_ibu}}" placeholder="Nama Ibu" required data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="pekerjaan_ibu">
                        Pekerjaan Ibu <small class="text-red-500">*</small>
                    </label>
                    <input type="text" name="pekerjaan_ibu" value="{{$ortu->pekerjaan_ibu}}" placeholder="Pekerjaan Ibu" required data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="pendidikan_terakhir_ibu">
                        Pendidikan Terakhir Ibu <small class="text-red-500">*</small>
                    </label>
                    <input type="text" name="pendidikan_terakhir_ibu" value="{{$ortu->pendidikan_terakhir_ibu}}" placeholder="Pendidikan Terakhir Ibu" required data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>

                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="nohp_ibu">
                        Nomor HP Ibu <small class="text-red-500">*</small>
                    </label>
                    <input type="text" name="nohp_ibu" value="{{$ortu->nohp_ibu}}" placeholder="Nomor HP Ibu" required data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>

                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="nama_ayah">
                        Nama Ayah <small class="text-red-500">*</small>
                    </label>
                    <input type="text" name="nama_ayah" value="{{$ortu->nama_ayah}}" placeholder="Nama Ayah" required data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="pekerjaan_ayah">
                        Pekerjaan Ayah <small class="text-red-500">*</small>
                    </label>
                    <input type="text" name="pekerjaan_ayah" value="{{$ortu->pekerjaan_ayah}}" placeholder="Pekerjaan Ayah" required data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="pendidikan_terakhir_ayah">
                        Pendidikan Terakhir Ayah <small class="text-red-500">*</small>
                    </label>
                    <input type="text" name="pendidikan_terakhir_ayah" value="{{$ortu->pendidikan_terakhir_ayah}}" placeholder="Pendidikan Terakhir Ayah" required data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>

                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="nohp_ayah">
                        Nomor HP Ayah <small class="text-red-500">*</small>
                    </label>
                    <input type="text" name="nohp_ayah" value="{{$ortu->nohp_ayah}}" placeholder="Nomor HP Ayah" required data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="kelurahan">
                        Kelurahan <small class="text-red-500">*</small>
                    </label>
                    <input type="text" name="kelurahan" value="{{$ortu->kelurahan}}" placeholder="Kelurahan" required data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="kelurahan">
                        Kecamatan, Kab/Kota, Provinsi <small class="text-red-500">*</small>
                    </label>
                    <select required class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60" id="district_id" name="district_id" aria-label="Default select example">
                        @if (!empty($ortu->district_id))
                            <option value="{{$ortu->district_id}}">{{$ortu->district->name}}, {{$ortu->district->regency->name}}, {{$ortu->district->regency->province->name}}</option>
                        @else
                            <option></option>
                        @endif
                    </select>
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="jalan">
                        Jalan <small class="text-red-500">*</small>
                    </label>
                    <input type="text" name="jalan" value="{{$ortu->jalan}}" placeholder="Jalan" required data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="rt_rw">
                        RT RW <small class="text-red-500">*</small>
                    </label>
                    <input type="text" name="rt_rw" value="{{$ortu->rt_rw}}" placeholder="000/000" required data-parsley-trigger="keyup" class="rt_rw bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="no_rmh">
                        Nomor Rumah <small class="text-red-500">*</small>
                    </label>
                    <input type="text" name="no_rmh" value="{{$ortu->no_rmh}}" placeholder="Nomor Rumah" required data-parsley-trigger="keyup" class="rt_rw bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="kodepos">
                        Kode Pos <small class="text-red-500">*</small>
                    </label>
                    <input type="number" name="kodepos" value="{{$ortu->kodepos}}" placeholder="Kode Pos" required data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4">
                        <input required data-parsley-trigger="keyup" type="checkbox" name="status" value="1" class="checks form-checkbox text-green-500">
                        <span class="ml-2">Saya sudah memeriksa kembali sebelum menyimpan</span>
                    </label>
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="password">
                      <small class="text-red-500">*</small> Wajib Diisi
                    </label>
                </div>

                
                
                
                <div class="flex justify-center mt-3">
                    <button type="submit"
                            class="focus:outline-none px-4 bg-blue-900 p-3 ml-3 rounded-lg text-white hover:bg-blue-800">Simpan</button>
                </div>
            </div>
        </form>

      </div>
    </div>
    <!--/ main content -->
  </div>
@endsection
@section('script')
<script type="text/javascript">

    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){

      $( "#district_id" ).select2({
        ajax: { 
          url: "{{route('kecamatan')}}",
          type: "post",
          dataType: 'json',
          delay: 250,
          data: function (params) {
            return {
              _token: CSRF_TOKEN,
              search: params.term // search term
            };
          },
          processResults: function (response) {
            return {
              results: response
            };
          },
          cache: true
        }

      });

    });
    
</script>
@endsection