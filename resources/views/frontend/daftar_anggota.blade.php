@extends('layouts.auth')
@section('description','Daftar')
@section('title','Daftar')
@section('body')
<div class="container w-full flex flex-wrap mx-auto px-2 pt-8 lg:pt-16 mt-16">
    <div class="w-full lg:w-1/5 px-6 text-xl text-gray-800 leading-normal">
        <div class="w-full sticky inset-0 hidden max-h-64 lg:h-auto overflow-x-hidden overflow-y-auto lg:overflow-y-hidden lg:block mt-0 my-2 lg:my-0 border border-gray-400 lg:border-transparent bg-white shadow lg:shadow-none lg:bg-transparent z-20" style="top:6em;" id="menu-content">
            <ul class="list-reset py-2 md:py-0">
                <li class="py-1 md:my-2 hover:bg-yellow-100 lg:hover:bg-transparent border-l-4 border-transparent font-bold border-yellow-600">
                    <a href='#section1' class="block pl-4 align-middle text-gray-700 no-underline hover:text-yellow-600">
                        <span class="pb-1 md:pb-0 text-sm">Data Diri</span>
                    </a>
                </li>
                <li class="py-1 md:my-2 hover:bg-yellow-100 lg:hover:bg-transparent border-l-4 border-transparent">
                    <a href='#tim' class="block pl-4 align-middle text-gray-700 no-underline hover:text-yellow-600">
                        <span class="pb-1 md:pb-0 text-sm">Data Ketua</span>
                    </a>
                </li>
                <li class="py-1 md:my-2 hover:bg-yellow-100 lg:hover:bg-transparent border-l-4 border-transparent">
                    <a href='#section3' class="block pl-4 align-middle text-gray-700 no-underline hover:text-yellow-600">
                        <span class="pb-1 md:pb-0 text-sm">Data Akun</span>
                    </a>
                </li>

                <li class="py-1 md:my-2 hover:bg-yellow-100 lg:hover:bg-transparent border-l-4 border-transparent">
                    <a href='#section5' class="block pl-4 align-middle text-gray-700 no-underline hover:text-yellow-600">
                        <span class="pb-1 md:pb-0 text-sm">Finalisasi</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!--Section container-->
    <section class="w-full lg:w-4/5">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form id="validate_form" method="POST" action="{{route('registration_anggota')}}">
            @csrf

            <!--Title-->
            <h1 class="flex items-center font-sans font-bold break-normal text-gray-700 px-2 text-xl mt-12 lg:mt-0 md:text-2xl">
                Pendaftaran Festival Lomba dan Seni Siswa Nasional @php echo date('Y') @endphp
            </h1>


            <!--divider-->
            <hr class="bg-gray-300 my-12">

            <!--Title-->
            <h2 class="font-sans font-bold break-normal text-gray-700 px-2 pb-8 text-xl">Data Diri</h2>

            <!--Card-->
            <div id='section1' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">

                

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                                NISN <small class="text-red-500">*</small>
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input name="nisn" value="{{old('nisn', $datas['nisn'])}}" data-parsley-type="integer" data-parsley-trigger="keyup" required class="form-input block w-full focus:bg-white" id="nisn" type="text">
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="nama">
                                Nama <small class="text-red-500">*</small>
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input name="name" class="form-input block w-full focus:bg-white" id="nama" type="text" value="{{old('name', $datas['nama'])}}" required data-parsley-trigger="keyup">
                            
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="email_pribadi">
                                E-Mail Pribadi dan Aktif <small class="text-red-500">*</small>
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="form-input block w-full focus:bg-white" id="email_pribadi" type="email" name="email_pribadi" value="{{old('email_pribadi', $datas['email'])}}" required data-parsley-type="email" data-parsley-trigger="keyup">
                            
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                                KIP (Isi Jika Ada)
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input name="kip" value="{{old('kip', $datas['no_KIP'])}}" class="form-input block w-full focus:bg-white" id="kip" type="text">
                        </div>
                    </div>
                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                                NIK <small class="text-red-500">*</small>
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input name="nik" class="form-input block w-full focus:bg-white" id="nik" type="text" value="{{old('nik', $datas['nik'])}}" required data-parsley-minlength="16" data-parsley-type="integer" data-parsley-trigger="keyup">
                            
                        </div>
                    </div>
                    
                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="jenis_kelamin">
                                Jenis Kelamin <small class="text-red-500">*</small>
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <select required name="jenis_kelamin" class="form-select block w-full focus:bg-white" id="jenis_kelamin">
                                <option @if ($datas['jenis_kelamin'] == 'L') selected @endif value="L">Laki - Laki</option>
								<option @if ($datas['jenis_kelamin'] == 'P') selected @endif value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="agama">
                                Agama <small class="text-red-500">*</small>
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="form-input block w-full focus:bg-white" id="agama" name="agama" value="{{old('agama', $datas['agama'])}}" type="text" data-parsley-trigger="keyup" required>
                            
                        </div>
                    </div>
                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="tempat_lahir">
                                Tempat Lahir <small class="text-red-500">*</small>
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="form-input block w-full focus:bg-white" id="tempat_lahir" name="tempat_lahir" value="{{old('tempat_lahir', $datas['tempat_lahir'])}}" type="text" data-parsley-trigger="keyup" required>
                            
                        </div>
                    </div>
                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="tanggal_lahir">
                                Tanggal Lahir <small class="text-red-500">*</small>
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="form-input block w-full focus:bg-white" id="tanggal_lahir" name="tanggal_lahir" value="{{old('tanggal_lahir', $datas['tanggal_lahir'])}}" type="date" data-parsley-trigger="keyup" required>
                            
                        </div>
                    </div>
                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="nohp">
                                Nomor HP <small class="text-red-500">*</small>
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="form-input block w-full focus:bg-white" id="nohp" type="text" name="nohp" value="{{old('nohp', $datas['nomor_telepon_seluler'])}}" data-parsley-trigger="keyup" required>
                            
                        </div>
                    </div>
                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="kelas">
                                Kelas <small class="text-red-500">*</small>
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <select required name="kelas" class="form-select block w-full focus:bg-white" id="kelas">
                                <option @if ($datas['tingkat_pendidikan'] == 10) selected @endif value="10">10</option>
								<option @if ($datas['tingkat_pendidikan'] == 11) selected @endif value="11">11</option>
								<option @if ($datas['tingkat_pendidikan'] == 12) selected @endif value="12">12</option>
                            </select>
                        </div>
                    </div>
                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="ukuran_baju">
                                Ukuran Baju <small class="text-red-500">*</small>
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <select required name="ukuran_baju" class="form-select block w-full focus:bg-white" id="ukuran_baju">
                                <option value="XS">XS</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                                <option value="XXXL">XXXL</option>
                            </select>
                        </div>
                    </div>
                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="kelurahan">
                                Kelurahan <small class="text-red-500">*</small>
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="form-input block w-full focus:bg-white" id="kelurahan" type="text" name="kelurahan" @if ($datas['bentuk_pendidikan'] == 'MA')
                            value="{{old('kelurahan', $datas['kelurahan'])}}"
                        @else
                            value="{{old('kelurahan', $datas['desa_kelurahan'])}}"
                        @endif data-parsley-trigger="keyup" required>
                            
                        </div>
                    </div>
                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="district_id">
                                Kecamatan <small class="text-red-500">*</small>
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <select required id="district_id" name="district_id" class="form-select block w-full focus:bg-white">
                                <option></option>
                            </select>
                            <p class="py-2 text-sm text-gray-600">(Cari berdasarkan nama kecamatan)</p>
                            
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="jalan">
                                Jalan <small class="text-red-500">*</small>
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="form-input block w-full focus:bg-white" id="jalan" data-parsley-trigger="keyup" value="{{old('jalan', $datas['alamat_jalan'])}}" required name="jalan" type="text">
                            
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="no_rmh">
                                Nomor Rumah <small class="text-red-500">*</small>
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="form-input block w-full focus:bg-white" id="no_rmh" data-parsley-trigger="keyup" value="{{old('no_rmh')}}" required name="no_rmh" type="text">
                            
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="rt_rw">
                                RT/RW <small class="text-red-500">*</small>
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input placeholder="000/000" class="form-input block w-full focus:bg-white rt_rw" id="rt_rw" data-parsley-trigger="keyup" value="{{old('rt_rw')}}" required name="rt_rw" type="text">
                            
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="kodepos">
                                Kode Pos <small class="text-red-500">*</small>
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="form-input block w-full focus:bg-white" id="kodepos" data-parsley-trigger="keyup" value="{{old('kodepos')}}" required name="kodepos" type="number">
                            
                        </div>
                    </div>
                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="alamat_siln">
                                Alamat (Khusus Peserta Sekolah Indonesia Luar Negri)
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <textarea class="form-input block w-full focus:bg-white" name="alamat_siln" id="alamat_siln"></textarea>
                        </div>
                    </div>
            </div>
            <!--/Card-->

            
            <!--divider-->
            <hr class="bg-gray-300 my-12">

            <!--Title-->
            <h2 class="font-sans font-bold break-normal text-gray-700 px-2 pb-8 text-xl">Data Ketua</h2>

            <!--Card-->
            <div id='tim' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                <div class="md:flex mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="ketua">
                            Ketua <small class="text-red-500">*</small>
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input disabled class="form-input block w-full focus:bg-white" id="ketua" value="{{$ketua->user->name}}" type="text">
                        <input type="hidden" name="tim_id" value="{{$ketua->tim->id}}">
                        <input type="hidden" name="bidang_idd" value="{{$ketua->tim->bidang_id}}">
                    </div>
                </div>
                <div class="md:flex mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="bid">
                            Bidang <small class="text-red-500">*</small>
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input disabled class="form-input block w-full focus:bg-white" id="bid" value="{{$ketua->tim->bidang_provinsi->bidang->nama_bidang}} {{$ketua->tim->bidang_provinsi->province->name}}" type="text">
                       
                    </div>
                </div>
                    

            </div>
            <!--/Card-->

            <!--divider-->
            <hr class="bg-gray-300 my-12">

            <!--Title-->
            <h2 class="font-sans font-bold break-normal text-gray-700 px-2 pb-8 text-xl">Data Akun</h2>

            <!--Card-->
            <div id='section3' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="email">
                                E-Mail Akun <small class="text-red-500">*</small>
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="form-input block w-full focus:bg-white" id="email" type="email" name="email" value="{{old('email', $datas['email'])}}" required data-parsley-type="email" data-parsley-trigger="keyup">
                            
                        </div>
                    </div>
                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="password">
                                Kata Sandi <small class="text-red-500">*</small>
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="form-input block w-full focus:bg-white" id="password" type="password" name="password" data-parsley-minlength="8" required autocomplete="new-password" data-parsley-trigger="keyup">
                            
                        </div>
                    </div>
                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="password_confirmation">
                                Ulangi Kata Sandi <small class="text-red-500">*</small>
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input id="password_confirmation" class="form-input block w-full focus:bg-white" type="password" name="password_confirmation" data-parsley-equalto="#password" required data-parsley-trigger="keyup">
                            
                        </div>
                    </div>


            </div>
            <!--/Card-->

            <!--divider-->
            <hr class="bg-gray-300 my-12">

            <!--Title-->
            <h2 class="font-sans font-bold break-normal text-gray-700 px-2 pb-8 text-xl">Finalisasi</h2>

            <!--Card-->
            <div id='section5' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">

                <div>
                    <label class="inline-flex items-center">
                        <input required type="checkbox" name="tes" class="checks form-checkbox text-green-500">
                        <span class="ml-2">Saya sudah memeriksa kembali sebelum mendaftar</span>
                    </label>
                </div>
                <input id="nama_ibu" value="{{old('nama_ibu', $datas['nama_ibu_kandung'])}}" name="nama_ibu" type="hidden" class="form-control">
                <input id="pekerjaan_ibu" value="{{old('pekerjaan_ibu', $datas['pekerjaan_ibu'])}}" name="pekerjaan_ibu" type="hidden" class="form-control">
                <input id="pendidikan_terakhir_ibu" value="{{old('pendidikan_terakhir_ibu', $datas['jenjang_pendidikan_ibu_keterangan'])}}" name="pendidikan_terakhir_ibu" type="hidden" class="form-control">
                <input id="nama_ayah" value="{{old('nama_ayah', $datas['nama_ayah'])}}" name="nama_ayah" type="hidden" class="form-control">
                <input id="pekerjaan_ayah" value="{{old('pekerjaan_ayah', $datas['pekerjaan_ayah'])}}" name="pekerjaan_ayah" type="hidden" class="form-control">
                <input id="pendidikan_terakhir_ayah" value="{{old('pendidikan_terakhir_ayah', $datas['jenjang_pendidikan_ayah_keterangan'])}}" name="pendidikan_terakhir_ayah" type="hidden" class="form-control">                

                

                <div class="pt-8">

                    <button class="shadow bg-yellow-700 hover:bg-yellow-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded mr-4" type="submit">
                        Daftar
                    </button>

                </div>

            </div>
            <!--/Card-->
        </form>
    </section>
    <!--/Section container-->

    <!--Back link -->
    <div class="w-full lg:w-4/5 lg:ml-auto text-base md:text-sm text-gray-600 px-4 py-24 mb-12">
     
     </div>

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
<script type="text/javascript">

    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){

      $( "#district_sekolah_id" ).select2({
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
<script type="text/javascript">

    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){

      $( "#province_id" ).select2({
        ajax: { 
          url: "{{route('province')}}",
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
<script type="text/javascript">

    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){

      $( "#bidang_id" ).select2({
        ajax: { 
          url: "{{route('bidang-provinsi')}}",
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