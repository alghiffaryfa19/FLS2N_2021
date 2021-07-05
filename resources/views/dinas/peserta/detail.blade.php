@extends('layouts.dinas')
@section('title','Biodata')
@section('content')
<div class="flex-1 flex flex-col bg-blue-50 py-4 lg:py-8 px-4 lg:px-6 xl:px-8 overflow-hidden">

    <!-- topbar -->
    <div class="max-w-screen-2xl w-full mx-auto flex justify-between">
      <div class="hidden md:block">
        <h1 class="text-2xl mb-1 font-bold text-blue-800">Biodata</h1>
      </div>
    </div>
    <!--/ topbar -->

    <!-- main content -->
    <div class="flex-1 py-4 lg:py-10">
      <div class="max-w-screen-2xl mx-auto">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form id="validate_form" enctype="multipart/form-data" method="POST" action="#">
            @method('PUT')
            @csrf
            <div class="bg-white rounded-lg px-4 lg:px-8 py-4 lg:py-6 mt-8">
                <div class="flex justify-center mt-3">
                    @if (empty($biodata->biodata->foto))
                        <img style="height: 200px;width: 200px; object-fit: cover" alt="{{$biodata->biodata->nisn}}" class="rounded-full" src="{{asset('dist/images/profile-2.jpg')}}">
                    @else
                        <img style="height: 200px;width: 200px; object-fit: cover" alt="{{$biodata->biodata->nisn}}" class="rounded-full" src="{{asset('uploads/'.$biodata->biodata->foto)}}">
                    @endif
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="nisn">
                        NISN
                    </label>
                    <input type="number" name="nisn" readonly value="{{$biodata->biodata->nisn}}" placeholder="NISN" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="kip">
                        KIP (Jika Ada)
                    </label>
                    <input type="text" name="kip" readonly value="{{$biodata->biodata->kip}}" placeholder="KIP" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="nik">
                        NIK
                    </label>
                    <input type="number" name="nik" readonly value="{{$biodata->biodata->nik}}" placeholder="NIK" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="jenis_kelamin">
                        Jenis Kelamin
                    </label>
                    <select name="jenis_kelamin" readonly class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60" id="jenis_kelamin">
                        <option @if ($biodata->biodata->jenis_kelamin == 'L') selected @endif value="L">Laki - Laki</option>
                        <option @if ($biodata->biodata->jenis_kelamin == 'P') selected @endif value="P">Perempuan</option>
                    </select>
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="agama">
                        Agama
                    </label>
                    <input type="text" name="agama" value="{{$biodata->biodata->agama}}" placeholder="Agama" readonly class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="tempat_lahir">
                        Tempat Lahir
                    </label>
                    <input type="text" name="tempat_lahir" value="{{$biodata->biodata->tempat_lahir}}" placeholder="Tempat Lahir" readonly class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="tanggal_lahir">
                        Tanggal Lahir
                    </label>
                    <input type="date" name="tanggal_lahir" value="{{$biodata->biodata->tanggal_lahir}}" placeholder="Tanggal Lahir" readonly class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="nohp">
                        Nomor HP
                    </label>
                    <input type="text" name="nohp" value="{{$biodata->biodata->nohp}}" placeholder="Nomor HP" readonly class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="ukuran_baju">
                        Ukuran Baju
                    </label>
                    <select name="ukuran_baju" required data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60" id="jenis_kelamin">
                        <option @if($biodata->biodata->ukuran_baju == 'XS') selected @endif value="XS">XS</option>
                        <option @if($biodata->biodata->ukuran_baju == 'S') selected @endif value="S">S</option>
                        <option @if($biodata->biodata->ukuran_baju == 'M') selected @endif value="M">M</option>
                        <option @if($biodata->biodata->ukuran_baju == 'L') selected @endif value="L">L</option>
                        <option @if($biodata->biodata->ukuran_baju == 'XL') selected @endif value="XL">XL</option>
                        <option @if($biodata->biodata->ukuran_baju == 'XXL') selected @endif value="XXL">XXL</option>
                        <option @if($biodata->biodata->ukuran_baju == 'XXXL') selected @endif value="XXXL">XXXL</option>
                    </select>
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="kelurahan">
                        Kelurahan
                    </label>
                    <input type="text" name="kelurahan" value="{{$biodata->biodata->kelurahan}}" placeholder="Kelurahan" readonly class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="kelurahan">
                        Kecamatan, Kab/Kota, Provinsi
                    </label>
                    <select readonly class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60" id="district_id" name="district_id" aria-label="Default select example">
                        @if (!empty($biodata->biodata->district_id))
                            <option value="{{$biodata->biodata->district_id}}">{{$biodata->biodata->district->name}}, {{$biodata->biodata->district->regency->name}}, {{$biodata->biodata->district->regency->province->name}}</option>
                        @else
                            <option></option>
                        @endif
                    </select>
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="jalan">
                        Jalan
                    </label>
                    <input type="text" name="jalan" value="{{$biodata->biodata->jalan}}" placeholder="Jalan" readonly class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="rt_rw">
                        RT RW
                    </label>
                    <input type="text" name="rt_rw" value="{{$biodata->biodata->rt_rw}}" placeholder="000/000" readonly class="rt_rw bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="no_rmh">
                        Nomor Rumah
                    </label>
                    <input type="text" name="no_rmh" value="{{$biodata->biodata->no_rmh}}" placeholder="Nomor Rumah" readonly class="rt_rw bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="kodepos">
                        Kode Pos
                    </label>
                    <input type="number" name="kodepos" value="{{$biodata->biodata->kodepos}}" placeholder="Kode Pos" readonly class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                @if (cek_berkelompok($biodata->bidang_provinsi->bidang_id) == 1)
                <div class="flex mt-7 items-center text-center">
                    <hr class="border-gray-300 border-1 w-full rounded-md">
                    <label class="block font-medium text-l text-gray-600 w-full">
                        Anggota
                    </label>
                    <hr class="border-gray-300 border-1 w-full rounded-md">
                </div>
                <div class="flex justify-center mt-3">
                    @if (empty($biodata->anggota->foto))
                        <img style="height: 200px;width: 200px; object-fit: cover" alt="{{$biodata->anggota->nisn}}" class="rounded-full" src="{{asset('dist/images/profile-2.jpg')}}">
                    @else
                        <img style="height: 200px;width: 200px; object-fit: cover" alt="{{$biodata->anggota->nisn}}" class="rounded-full" src="{{asset('uploads/'.$biodata->anggota->foto)}}">
                    @endif
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="nisn">
                        NISN
                    </label>
                    <input type="number" name="nisn" readonly value="{{$biodata->anggota->nisn}}" placeholder="NISN" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="kip">
                        KIP (Jika Ada)
                    </label>
                    <input type="text" name="kip" readonly value="{{$biodata->anggota->kip}}" placeholder="KIP" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="nik">
                        NIK
                    </label>
                    <input type="number" name="nik" readonly value="{{$biodata->anggota->nik}}" placeholder="NIK" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="jenis_kelamin">
                        Jenis Kelamin
                    </label>
                    <select name="jenis_kelamin" readonly class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60" id="jenis_kelamin">
                        <option @if ($biodata->anggota->jenis_kelamin == 'L') selected @endif value="L">Laki - Laki</option>
                        <option @if ($biodata->anggota->jenis_kelamin == 'P') selected @endif value="P">Perempuan</option>
                    </select>
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="agama">
                        Agama
                    </label>
                    <input type="text" name="agama" value="{{$biodata->anggota->agama}}" placeholder="Agama" readonly class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="tempat_lahir">
                        Tempat Lahir
                    </label>
                    <input type="text" name="tempat_lahir" value="{{$biodata->anggota->tempat_lahir}}" placeholder="Tempat Lahir" readonly class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="tanggal_lahir">
                        Tanggal Lahir
                    </label>
                    <input type="date" name="tanggal_lahir" value="{{$biodata->anggota->tanggal_lahir}}" placeholder="Tanggal Lahir" readonly class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="nohp">
                        Nomor HP
                    </label>
                    <input type="text" name="nohp" value="{{$biodata->anggota->nohp}}" placeholder="Nomor HP" readonly class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="ukuran_baju">
                        Ukuran Baju
                    </label>
                    <select name="ukuran_baju" required data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60" id="jenis_kelamin">
                        <option @if($biodata->anggota->ukuran_baju == 'XS') selected @endif value="XS">XS</option>
                        <option @if($biodata->anggota->ukuran_baju == 'S') selected @endif value="S">S</option>
                        <option @if($biodata->anggota->ukuran_baju == 'M') selected @endif value="M">M</option>
                        <option @if($biodata->anggota->ukuran_baju == 'L') selected @endif value="L">L</option>
                        <option @if($biodata->anggota->ukuran_baju == 'XL') selected @endif value="XL">XL</option>
                        <option @if($biodata->anggota->ukuran_baju == 'XXL') selected @endif value="XXL">XXL</option>
                        <option @if($biodata->anggota->ukuran_baju == 'XXXL') selected @endif value="XXXL">XXXL</option>
                    </select>
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="kelurahan">
                        Kelurahan
                    </label>
                    <input type="text" name="kelurahan" value="{{$biodata->anggota->kelurahan}}" placeholder="Kelurahan" readonly class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="kelurahan">
                        Kecamatan, Kab/Kota, Provinsi
                    </label>
                    <select readonly class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60" id="district_id" name="district_id" aria-label="Default select example">
                        @if (!empty($biodata->anggota->district_id))
                            <option value="{{$biodata->anggota->district_id}}">{{$biodata->anggota->district->name}}, {{$biodata->anggota->district->regency->name}}, {{$biodata->anggota->district->regency->province->name}}</option>
                        @else
                            <option></option>
                        @endif
                    </select>
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="jalan">
                        Jalan
                    </label>
                    <input type="text" name="jalan" value="{{$biodata->anggota->jalan}}" placeholder="Jalan" readonly class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="rt_rw">
                        RT RW
                    </label>
                    <input type="text" name="rt_rw" value="{{$biodata->anggota->rt_rw}}" placeholder="000/000" readonly class="rt_rw bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="no_rmh">
                        Nomor Rumah
                    </label>
                    <input type="text" name="no_rmh" value="{{$biodata->anggota->no_rmh}}" placeholder="Nomor Rumah" readonly class="rt_rw bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="kodepos">
                        Kode Pos
                    </label>
                    <input type="number" name="kodepos" value="{{$biodata->anggota->kodepos}}" placeholder="Kode Pos" readonly class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                @else
                <div class="flex mt-7 items-center text-center">
                    <hr class="border-gray-300 border-1 w-full rounded-md">
                    <label class="block font-medium text-l text-gray-600 w-full">
                        Tidak Ada Anggota
                    </label>
                    <hr class="border-gray-300 border-1 w-full rounded-md">
                </div>
                @endif
                
                
                <div class="flex mt-7 items-center text-center">
                    <hr class="border-gray-300 border-1 w-full rounded-md">
                    <label class="block font-medium text-l text-gray-600 w-full">
                        Berkas
                    </label>
                    <hr class="border-gray-300 border-1 w-full rounded-md">
                </div>
                @foreach ($biodata->unggahan as $item)
                <div class="flex flex-col mb-4">
                    <div>
                        <h2>{{$item->berkasss->nama_surat}}</h2>
                        <embed style="width: 100%; height: 500px" class="embed-responsive-item" src="{{asset('uploads/'.$item->berkas)}}">
                    </div>
                    <h2>atau</h2>
                    <div class="m-5"><a target="_blank" type="button" href="{{asset('uploads/'.$item->berkas)}}"
                        class="focus:outline-none px-4 bg-yellow-500 p-3 ml-3 rounded-lg text-white hover:bg-yellow-400">Buka di Tab Baru</a></div>
                </div>
                @endforeach
                <div class="flex mt-7 items-center text-center">
                    <hr class="border-gray-300 border-1 w-full rounded-md">
                    <label class="block font-medium text-l text-gray-600 w-full">
                        Karya
                    </label>
                    <hr class="border-gray-300 border-1 w-full rounded-md">
                </div>
                @foreach ($biodata->karya_provinsi as $item)
                    @if ($item->unggahan_bidang->type == 'url' && $item->unggahan_bidang->jenis == 'youtube')
                    <div class="flex flex-col mb-4">
                        <div>
                            <h2>{{$item->unggahan_bidang->nama_berkas}}</h2>
                            <embed style="width: 100%; height: 500px" class="embed-responsive-item" src="{{embed_video($item->input)}}">
                        </div>
                        <h2>atau</h2>
                        <div class="m-5"><a target="_blank" type="button" href="{{$item->input}}"
                            class="focus:outline-none px-4 bg-yellow-500 p-3 ml-3 rounded-lg text-white hover:bg-yellow-400">Buka di Tab Baru</a></div>
                    </div>
                    @elseif ($item->unggahan_bidang->type == 'url')
                    <div class="flex flex-col mb-4">
                        <div>
                            <h2>{{$item->unggahan_bidang->nama_berkas}}</h2>
                            <embed style="width: 100%; height: 500px" class="embed-responsive-item" src="{{$item->input}}">
                        </div>
                        <h2>atau</h2>
                        <div class="m-5"><a target="_blank" type="button" href="{{$item->input}}"
                            class="focus:outline-none px-4 bg-yellow-500 p-3 ml-3 rounded-lg text-white hover:bg-yellow-400">Buka di Tab Baru</a></div>
                    </div>
                    @elseif ($item->unggahan_bidang->type == 'file')
                    <div class="flex flex-col mb-4">
                        <div>
                            <h2>{{$item->unggahan_bidang->nama_berkas}}</h2>
                            <embed style="width: 100%; height: 500px" class="embed-responsive-item" src="{{asset('uploads/'.$item->input)}}">
                        </div>
                        <h2>atau</h2>
                        <div class="m-5"><a target="_blank" type="button" href="{{asset('uploads/'.$item->input)}}"
                            class="focus:outline-none px-4 bg-yellow-500 p-3 ml-3 rounded-lg text-white hover:bg-yellow-400">Buka di Tab Baru</a></div>
                    </div>
                    @else
                    <div class="flex flex-col mb-4">
                        <div>
                            <h2>{{$item->unggahan_bidang->nama_berkas}}</h2>
                            <div class="m-5"><a target="_blank" type="button" href="{{$item->input}}"
                                class="focus:outline-none px-4 bg-yellow-500 p-3 ml-3 rounded-lg text-white hover:bg-yellow-400">Buka di Tab Baru</a></div>
                        </div>
                        
                    </div>
                    @endif
                @endforeach
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