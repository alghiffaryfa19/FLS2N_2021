@extends('layouts.admin')
@section('title','Kategori')
@section('content')
<div class="flex-1 flex flex-col bg-blue-50 py-4 lg:py-8 px-4 lg:px-6 xl:px-8 overflow-hidden">

    <!-- topbar -->
    <div class="max-w-screen-2xl w-full mx-auto flex justify-between">
      <div class="hidden md:block">
        <h1 class="text-2xl mb-1 font-bold text-blue-800">Kategori</h1>
        
      </div>
    </div>
    <!--/ topbar -->

    <!-- main content -->
    <div class="flex-1 py-4 lg:py-10">
      <div class="max-w-screen-2xl mx-auto">
        <form id="validate_form" enctype="multipart/form-data" method="POST" action="{{route('kategori.update', $kategori->id)}}">
            @method('PUT')
            @csrf
            <div class="bg-white rounded-lg px-4 lg:px-8 py-4 lg:py-6 mt-8">
                
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="nama_kategori">
                        Nama Kategori
                    </label>
                    <input type="text" value="{{$kategori->nama_kategori}}" name="nama_kategori" placeholder="Nama Kategori" required data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
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