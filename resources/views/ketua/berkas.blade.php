@extends('layouts.ketua')
@section('title','Berkas')
@section('content')
<div class="flex-1 flex flex-col bg-blue-50 py-4 lg:py-8 px-4 lg:px-6 xl:px-8 overflow-hidden">

    <!-- topbar -->
    <div class="max-w-screen-2xl w-full mx-auto flex justify-between">
      <div class="hidden md:block">
        <h1 class="text-2xl mb-1 font-bold text-blue-800">Berkas</h1>
      </div>
    </div>
    <!--/ topbar -->

    <!-- main content -->
    <div class="flex-1 py-4 lg:py-10">
      <div class="max-w-screen-2xl mx-auto">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        @if(session('sukses'))
        <div class="block text-sm text-white bg-blue-900 border border-blue-800 h-12 flex items-center p-4 rounded-sm relative" role="alert">
            <strong class="mr-1">Berhasil mengunggah data</strong>
            <button type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
                <span class="absolute top-0 bottom-0 right-5 text-2xl px-3 py-1 hover:text-blue-500" aria-hidden="true" >×</span>
            </button>
          </div>
        @endif
        @if(session('isi'))
        <div class="block text-sm text-white bg-red-500 border border-red-400 h-12 flex items-center p-4 rounded-sm relative" role="alert">
            <strong class="mr-1">Maaf Lengkapi Berkas Dahulu</strong>
            <button type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
                <span class="absolute top-0 bottom-0 right-5 text-2xl px-3 py-1 hover:text-red-500" aria-hidden="true" >×</span>
            </button>
          </div>
        @endif
        @if(session('gagal'))
        <div class="block text-sm text-white bg-red-500 border border-red-400 h-12 flex items-center p-4 rounded-sm relative" role="alert">
            <strong class="mr-1">Maaf berkas sudah ada</strong>
            <button type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
                <span class="absolute top-0 bottom-0 right-5 text-2xl px-3 py-1 hover:text-red-500" aria-hidden="true" >×</span>
            </button>
          </div>
        @endif
        <div class="bg-white rounded-lg px-4 lg:px-8 py-4 lg:py-6 mt-8">
            @foreach ($berkas as $item)
            <div class="flex flex-col text-left w-full mt-10">
                <p> Pilih <b>{{$item->nama_surat}} </b></p>
                <label for="name" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">
                    (Pastikan Format Dokumen adalah PDF dan Tidak Lebih Dari 2 MB)
                </label>
                @if (!berkas($item->id,auth()->user()->biodata->tim->id))
                <form action="{{route('berkas.store')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="hidden" name="berkas_id" value="{{$item->id}}">
                    <div class="flex flex-row mt-5 ">
                        <div class="relative">
                            <input
                                    id="berkas"
                                    name="berkas"
                                    type="file"
                                    class="text-sm sm:text-base relative w-100 border rounded placeholder-gray-400 focus:border-indigo-400 focus:outline-none py-2 pr-2 pl-6">
                
                        </div>
                    </div>
                    <div class="flex flex-row mt-5 ">
                      <button type="submit"
                          class="focus:outline-none px-4 bg-blue-400 p-3 rounded-lg text-white hover:bg-blue-500">Unggah</button>
                  </div>
                </form>
                @endif
                
                <p class="mt-5"> Status Berkas </p>
                <div class="flex flex-wrap">
                    @if (berkas($item->id,auth()->user()->biodata->tim->id))
                        @foreach ($item->unggahan as $items)
                            <a href="{{asset('uploads/'.$items->berkas)}}" class="bg-yellow-600 py-2 px-8 shadow-md rounded text-white mr-5">Lihat Unggahan</a>
                            <a href="{{route('hapus.berkas', $items->id)}}" onclick="return confirm(`Apakah anda ingin menghapus ?`)" class="bg-red-600 py-2 px-8 shadow-md rounded text-white">Hapus Unggahan</a>
                        @endforeach
                    @else
                        <div class="bg-red-700 py-2 px-8 shadow-md rounded text-white mr-5">Belum mengunggah</div>
                    @endif
                    
                </div>
            </div>
            @endforeach  
        </div>

      </div>
    </div>
    <!--/ main content -->
  </div>
@endsection