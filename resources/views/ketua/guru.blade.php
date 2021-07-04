@extends('layouts.ketua')
@section('title','Pembimbing')
@section('content')
<div class="flex-1 flex flex-col bg-blue-50 py-4 lg:py-8 px-4 lg:px-6 xl:px-8 overflow-hidden">

    <!-- topbar -->
    <div class="max-w-screen-2xl w-full mx-auto flex justify-between">
      <div class="hidden md:block">
        <h1 class="text-2xl mb-1 font-bold text-blue-800">Pembimbing</h1>
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
            <strong class="mr-1">Maaf Lengkapi Data Pembimbing Dahulu</strong>
            <button type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
                <span class="absolute top-0 bottom-0 right-5 text-2xl px-3 py-1 hover:text-red-500" aria-hidden="true" >×</span>
            </button>
          </div>
        @endif
        <form id="validate_form" enctype="multipart/form-data" method="POST" action="{{route('pembimbing.save')}}">
            @method('PUT')
            @csrf
            <div class="bg-white rounded-lg px-4 lg:px-8 py-4 lg:py-6 mt-8">
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="name">
                        Nama <small class="text-red-500">*</small>
                    </label>
                    <input type="text" name="nama" value="{{$guru->nama}}" placeholder="Nama" required data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="email">
                        Email <small class="text-red-500">*</small>
                    </label>
                    <input type="email" name="email" value="{{$guru->email}}" placeholder="Email" required data-parsley-type="email" data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="jenis_kelamin">
                        Jenis Kelamin <small class="text-red-500">*</small>
                    </label>
                    <select name="jenis_kelamin" required data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60" id="jenis_kelamin">
                        <option @if ($guru->jenis_kelamin == 'L') selected @endif value="L">Laki - Laki</option>
                        <option @if ($guru->jenis_kelamin == 'P') selected @endif value="P">Perempuan</option>
                    </select>
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="tempat_lahir">
                        Tempat Lahir <small class="text-red-500">*</small>
                    </label>
                    <input type="text" name="tempat_lahir" value="{{$guru->tempat_lahir}}" placeholder="Tempat Lahir" required data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="tanggal_lahir">
                        Tanggal Lahir <small class="text-red-500">*</small>
                    </label>
                    <input type="date" name="tanggal_lahir" value="{{$guru->tanggal_lahir}}" placeholder="Tanggal Lahir" required data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="nik">
                        NIK <small class="text-red-500">*</small>
                    </label>
                    <input type="number" name="nik" value="{{$guru->nik}}" placeholder="NIK" required data-parsley-minlength="16" data-parsley-type="integer" data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="no_telp">
                        Nomor HP <small class="text-red-500">*</small>
                    </label>
                    <input type="text" name="no_telp" value="{{$guru->no_telp}}" placeholder="Nomor Telpon (WhatsApp)" required data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="nuptk">
                        NUPTK
                    </label>
                    <input type="number" name="nuptk" value="{{$guru->nuptk}}" placeholder="NUPTK" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="nip">
                        NIP
                    </label>
                    <input type="number" name="nip" value="{{$guru->nip}}" placeholder="NIP" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="kelurahan">
                        Kelurahan <small class="text-red-500">*</small>
                    </label>
                    <input type="text" name="kelurahan" value="{{$guru->kelurahan}}" placeholder="Kelurahan" required data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="kelurahan">
                        Kecamatan, Kab/Kota, Provinsi <small class="text-red-500">*</small>
                    </label>
                    <select required class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60" id="district_id" name="district_id" aria-label="Default select example">
                        @if (!empty($guru->district_id))
                            <option value="{{$guru->district_id}}">{{$guru->district->name}}, {{$guru->district->regency->name}}, {{$guru->district->regency->province->name}}</option>
                        @else
                            <option></option>
                        @endif
                    </select>
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="jalan">
                        Jalan <small class="text-red-500">*</small>
                    </label>
                    <input type="text" name="jalan" value="{{$guru->jalan}}" placeholder="Jalan" required data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="rt_rw">
                        RT RW <small class="text-red-500">*</small>
                    </label>
                    <input type="text" name="rt_rw" value="{{$guru->rt_rw}}" placeholder="000/000" required data-parsley-trigger="keyup" class="rt_rw bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="no_rmh">
                        Nomor Rumah <small class="text-red-500">*</small>
                    </label>
                    <input type="text" name="no_rmh" value="{{$guru->no_rmh}}" placeholder="Nomor Rumah" required data-parsley-trigger="keyup" class="rt_rw bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="kodepos">
                        Kode Pos <small class="text-red-500">*</small>
                    </label>
                    <input type="number" name="kodepos" value="{{$guru->kodepos}}" placeholder="Kode Pos" required data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="foto">
                       Surat Tugas dari Kepala Sekolah (PDF,Max 2MB) <small class="text-red-500">*</small>
                    </label>
                    <input type="file" name="surat_kepsek" @if (empty($guru->surat_kepsek)) required data-parsley-trigger="keyup" @endif class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
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

                
                @if (!empty($guru->surat_kepsek))
                <div class="flex justify-center mt-3">
                    <a type="button" href="{{asset('uploads/'.$guru->surat_kepsek)}}"
                            class="focus:outline-none px-4 bg-blue-900 p-3 ml-3 rounded-lg text-white hover:bg-blue-800">Buka Surat Yang Sudah Diunggah</a>
                </div>
                @else
                <div class="flex justify-center mt-3">
                    <a type="button" href="#"
                            class="focus:outline-none px-4 bg-red-500 p-3 ml-3 rounded-lg text-white hover:bg-red-400">Belum Unggah Surat</a>
                </div>
                @endif
                
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