@extends('layouts.frontend')
@section('title','Tiket')
@section('content')
<section class="text-gray-600 body-font relative">
    <div class="container px-5 py-24 mx-auto">
      @if(session('berhasil'))
      <div class="block text-sm text-white bg-blue-900 border border-blue-800 h-12 flex items-center p-4 rounded-sm relative" role="alert">
          <strong class="mr-1">Berhasil mengisi form kendala</strong>
          <button type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
              <span class="absolute top-0 bottom-0 right-5 text-2xl px-3 py-1 hover:text-blue-500" aria-hidden="true" >×</span>
          </button>
        </div>
      @endif
      @if(session('berhasil'))
      <div class="block text-sm text-white bg-blue-900 border border-blue-800 h-12 flex items-center p-4 rounded-sm relative" role="alert">
          <strong class="mr-1">Simpan kode {{ session()->get( 'berhasil' ) }} untuk cek kendala yang sudah dikirimkan, kode hanya muncul sekali</strong>
          <button type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
              <span class="absolute top-0 bottom-0 right-5 text-2xl px-3 py-1 hover:text-blue-500" aria-hidden="true" >×</span>
          </button>
        </div>
      @endif
      <div class="flex flex-col text-center w-full mb-12">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Beritahu Kami Kendalamu</h1>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Agar kami dapat membantu</p>
      </div>
      <form action="{{route('add_tiket')}}" method="POST">
        @csrf
        <div class="lg:w-1/2 md:w-2/3 mx-auto">
          <div class="flex flex-wrap -m-2">
            <div class="p-2 w-1/2">
              <div class="relative">
                <label for="nama" class="leading-7 text-sm text-gray-600">Nama</label>
                <input type="text" id="nama" required name="nama" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
            </div>
            <div class="p-2 w-1/2">
              <div class="relative">
                <label for="nisn" class="leading-7 text-sm text-gray-600">NISN</label>
                <input type="text" id="nisn" required name="nisn" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
            </div>
            <div class="p-2 w-full">
              <div class="relative">
                  <label for="nisn" class="leading-7 text-sm text-gray-600">Nomor WhatsApp (Gunakan format 628xxxxxxxxxx)</label>
                  <input type="text" id="wa" required name="wa" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
            </div>
            <div class="p-2 w-full">
              <div class="relative">
                  <label for="nisn" class="leading-7 text-sm text-gray-600">Judul Kendala</label>
                  <input type="text" id="judul" required name="judul" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
            </div>
            <div class="p-2 w-full">
              <div class="relative">
                <label for="bidang_id" class="leading-7 text-sm text-gray-600">Bidang</label>
                <select name="bidang_id" required id="bidang_id" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    @foreach ($bidang as $item)
                     <option value="{{$item->id}}">{{$item->nama_bidang}}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <div class="p-2 w-full">
              <div class="relative">
                <label for="detail" class="leading-7 text-sm text-gray-600">Ceritakan kendalamu secara detail</label>
                <textarea id="detail" required name="detail" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
              </div>
            </div>
  
            <div class="p-2 w-full">
              <button type="submit" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Kirim</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>
@endsection