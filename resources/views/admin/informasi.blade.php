@extends('layouts.admin')
@section('title','Informasi')
@section('content')
<div class="flex-1 flex flex-col bg-blue-50 py-4 lg:py-8 px-4 lg:px-6 xl:px-8 overflow-hidden">

    <!-- topbar -->
    <div class="max-w-screen-2xl w-full mx-auto flex justify-between">
      <div class="hidden md:block">
        <h1 class="text-2xl mb-1 font-bold text-blue-800">Informasi</h1>
        
      </div>
    </div>
    <!--/ topbar -->

    <!-- main content -->
    <div class="py-4 lg:py-10 mb-5">
      <div class="max-w-screen-2xl mx-auto">
        <div class="form-input">
            <a href="{{route('slider.index')}}"  class="bg-yellow-600 py-2 px-8 shadow-md rounded text-white mr-1">Slider</a>
            <a href="{{route('video.index')}}"  class="bg-yellow-600 py-2 px-8 shadow-md rounded text-white mr-1">Video</a>
            <a href="{{route('info.index')}}"  class="bg-yellow-600 py-2 px-8 shadow-md rounded text-white mr-1">Informasi</a>
            <a href="{{route('berita.index')}}"  class="bg-yellow-600 py-2 px-8 shadow-md rounded text-white mr-1">Berita</a>
            <a href="{{route('faq.index')}}"  class="bg-yellow-600 py-2 px-8 shadow-md rounded text-white mr-1">FAQ</a>
            <a href="{{route('kendala.index')}}"  class="bg-yellow-600 py-2 px-8 shadow-md rounded text-white mr-1">Kendala</a>
            <a href="{{route('unduhan.index')}}"  class="bg-yellow-600 py-2 px-8 shadow-md rounded text-white mr-1">Unduhan</a>
        </div>
      </div>
    </div>
    <div class="py-4 lg:py-10  mb-5">
      <div class="max-w-screen-2xl mx-auto">
        <div class="form-input">
            <a href="{{route('kategori.index')}}"  class="bg-yellow-600 py-2 px-8 shadow-md rounded text-white mr-1">Kategori</a>
            <a href="{{route('bidang.index')}}"  class="bg-yellow-600 py-2 px-8 shadow-md rounded text-white mr-1">Bidang (Information Only)</a>
        </div>
      </div>
    </div>
    <!--/ main content -->
  </div>
@endsection