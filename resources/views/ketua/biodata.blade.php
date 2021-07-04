@extends('layouts.ketua')
@section('title','Biodata')
@section('content')
<div class="flex-1 flex flex-col bg-blue-50 py-4 lg:py-8 px-4 lg:px-6 xl:px-8 overflow-hidden">

    <!-- topbar -->
    <div class="max-w-screen-2xl w-full mx-auto flex justify-between">
      <div class="hidden md:block">
        <h1 class="text-2xl mb-1 font-bold text-blue-800">Akun</h1>
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
            <strong class="mr-1">Maaf Lengkapi Biodata Dahulu</strong>
            <button type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
                <span class="absolute top-0 bottom-0 right-5 text-2xl px-3 py-1 hover:text-red-500" aria-hidden="true" >×</span>
            </button>
          </div>
        @endif
        <form id="validate_form" enctype="multipart/form-data" method="POST" action="{{route('biodata.ketua.save')}}">
            @method('PUT')
            @csrf
            <div class="bg-white rounded-lg px-4 lg:px-8 py-4 lg:py-6 mt-8">
                <div class="flex justify-center mt-3">
                    @if (empty($biodata->foto))
                        <img style="height: 200px;width: 200px; object-fit: cover" alt="{{$biodata->nisn}}" class="rounded-full" src="{{asset('dist/images/profile-2.jpg')}}">
                    @else
                        <img style="height: 200px;width: 200px; object-fit: cover" alt="{{$biodata->nisn}}" class="rounded-full" src="{{asset('uploads/'.$biodata->foto)}}">
                    @endif
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="nisn">
                        NISN <small class="text-red-500">Hubungi narahubung jika salah NISN</small>
                    </label>
                    <input type="number" name="nisn" value="{{$biodata->nisn}}" placeholder="NISN" disabled class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="kode">
                        Kode Refferal (Khusus digunakan bidang berkelompok)
                    </label>
                    <input type="text" name="kode" value="{{$biodata->kode}}" placeholder="Kode" disabled class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="email_pribadi">
                        Email Pribadi dan Aktif <small class="text-red-500">*</small>
                    </label>
                    <input type="email" name="email_pribadi" value="{{$biodata->email_pribadi}}" placeholder="Email Pribadi" required data-parsley-type="email" data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="kip">
                        KIP (Jika Ada)
                    </label>
                    <input type="text" name="kip" value="{{$biodata->kip}}" placeholder="KIP" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="nik">
                        NIK <small class="text-red-500">*</small>
                    </label>
                    <input type="number" name="nik" value="{{$biodata->nik}}" placeholder="NIK" required data-parsley-minlength="16" data-parsley-type="integer" data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="jenis_kelamin">
                        Jenis Kelamin <small class="text-red-500">*</small>
                    </label>
                    <select name="jenis_kelamin" required data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60" id="jenis_kelamin">
                        <option @if ($biodata->jenis_kelamin == 'L') selected @endif value="L">Laki - Laki</option>
                        <option @if ($biodata->jenis_kelamin == 'P') selected @endif value="P">Perempuan</option>
                    </select>
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="agama">
                        Agama <small class="text-red-500">*</small>
                    </label>
                    <input type="text" name="agama" value="{{$biodata->agama}}" placeholder="Agama" required data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="kelas">
                        Kelas <small class="text-red-500">*</small>
                    </label>
                    <select name="kelas" required data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60" id="jenis_kelamin">
                        <option @if ($biodata->kelas == 10) selected @endif value="10">10</option>
                        <option @if ($biodata->kelas == 11) selected @endif value="11">11</option>
                        <option @if ($biodata->kelas == 12) selected @endif value="12">12</option>
                    </select>
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="tempat_lahir">
                        Tempat Lahir <small class="text-red-500">*</small>
                    </label>
                    <input type="text" name="tempat_lahir" value="{{$biodata->tempat_lahir}}" placeholder="Tempat Lahir" required data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="tanggal_lahir">
                        Tanggal Lahir <small class="text-red-500">*</small>
                    </label>
                    <input type="date" name="tanggal_lahir" value="{{$biodata->tanggal_lahir}}" placeholder="Tanggal Lahir" required data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="nohp">
                        Nomor HP <small class="text-red-500">*</small>
                    </label>
                    <input type="text" name="nohp" value="{{$biodata->nohp}}" placeholder="Nomor HP" required data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="ukuran_baju">
                        Ukuran Baju <small class="text-red-500">*</small>
                    </label>
                    <select name="ukuran_baju" required data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60" id="jenis_kelamin">
                        <option @if($biodata->ukuran_baju == 'XS') selected @endif value="XS">XS</option>
                        <option @if($biodata->ukuran_baju == 'S') selected @endif value="S">S</option>
                        <option @if($biodata->ukuran_baju == 'M') selected @endif value="M">M</option>
                        <option @if($biodata->ukuran_baju == 'L') selected @endif value="L">L</option>
                        <option @if($biodata->ukuran_baju == 'XL') selected @endif value="XL">XL</option>
                        <option @if($biodata->ukuran_baju == 'XXL') selected @endif value="XXL">XXL</option>
                        <option @if($biodata->ukuran_baju == 'XXXL') selected @endif value="XXXL">XXXL</option>
                    </select>
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="kelurahan">
                        Kelurahan <small class="text-red-500">*</small>
                    </label>
                    <input type="text" name="kelurahan" value="{{$biodata->kelurahan}}" placeholder="Kelurahan" required data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="kelurahan">
                        Kecamatan <small class="text-red-500">*</small>
                    </label>
                    <select required class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60" id="district_id" name="district_id" aria-label="Default select example">
                        @if (!empty($biodata->district_id))
                            <option value="{{$biodata->district_id}}">{{$biodata->district->name}}, {{$biodata->district->regency->name}}, {{$biodata->district->regency->province->name}}</option>
                        @else
                            <option></option>
                        @endif
                    </select>
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="jalan">
                        Jalan <small class="text-red-500">*</small>
                    </label>
                    <input type="text" name="jalan" value="{{$biodata->jalan}}" placeholder="Jalan" required data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="rt_rw">
                        RT RW <small class="text-red-500">*</small>
                    </label>
                    <input type="text" name="rt_rw" value="{{$biodata->rt_rw}}" placeholder="000/000" required data-parsley-trigger="keyup" class="rt_rw bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="no_rmh">
                        Nomor Rumah <small class="text-red-500">*</small>
                    </label>
                    <input type="text" name="no_rmh" value="{{$biodata->no_rmh}}" placeholder="Nomor Rumah" required data-parsley-trigger="keyup" class="rt_rw bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="kodepos">
                        Kode Pos <small class="text-red-500">*</small>
                    </label>
                    <input type="number" name="kodepos" value="{{$biodata->kodepos}}" placeholder="Kode Pos" required data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="kodepos">
                        Alamat (Khusus Peserta Sekolah Indonesia Luar Negeri)
                    </label>
                    <textarea name="alamat_siln" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60" >{{$biodata->alamat_siln}}</textarea>
                    
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="foto">
                       Foto (Max 1MB) <small class="text-red-500">* Wajib diunggah pasca pertama kali mendaftar</small>
                    </label>
                    <input type="file" name="foto" @if (empty($biodata->foto)) required data-parsley-trigger="keyup" @endif class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
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