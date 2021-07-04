@extends('layouts.ketua')
@section('title','Dashboard')
@section('content')
<div class="flex-1 flex flex-col bg-blue-50 py-4 lg:py-8 px-4 lg:px-6 xl:px-8 overflow-hidden">

    <!-- topbar -->
    <div class="max-w-screen-2xl w-full mx-auto flex justify-between">
      <div class="hidden md:block">
        <h1 class="text-2xl mb-1 font-bold text-blue-800">Welcome {{auth()->user()->name}}</h1>
        
      </div>
    </div>
    <!--/ topbar -->

    <!-- main content -->
    <div class="flex-1 py-4 lg:py-10">
      <div class="max-w-screen-2xl mx-auto">
        <div class=" bg-white mb-5 rounded-lg px-4 lg:px-8 py-4 lg:py-6 mt-8 flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:space-x-12">
            <div>
              <h2 class="text-xl text-blue-900 font-bold mb-2">Khusus Pengguna Ponsel Genggam</h2>
              <p class="text-blue-900 opacity-70">Klik tombol pojok kiri atas untuk membuka menu</p>
            </div>
          </div>
          <img src="{{asset('fls2n/fls2n.png')}}" >

        @if (lolos(auth()->user()->biodata->tim->id) == 1)
            <section class="block py-24 leading-7 text-left text-gray-900 bg-white">
                <div class="relative w-full px-5 px-8 mx-auto leading-7 text-gray-900 max-w-7xl lg:px-16 xl:px-32">
                    <div class="flex flex-col flex-wrap items-center text-left md:flex-row">

                        <div class="flex-1 opacity-100 xl:pr-12 transform-none">
                            <h1 class="box-border mt-0 text-4xl font-normal tracking-tight text-center text-gray-900 sm:text-5xl md:text-4xl lg:text-5xl mb-7 md:text-left">
                                 <span class="text-green-600">Selamat Sobat Prestasi</span>
                            </h1>

                            <!-- Text -->
                            <p class="box-border mt-0 mb-8 text-base font-normal text-center text-gray-500 lg:text-xl md:text-left lg:mb-8">
                                Berhak melanjutkan perlombaan hingga tingkat nasional, silahkan unggah karya di menu Karya Nasional
                            </p>
                        </div>

                        <div class="relative flex justify-center flex-1 w-full px-5 mt-16 leading-7 text-gray-900 md:justify-end md:mt-0">
                            <!-- Image -->
                            <img src="https://cdn.devdojo.com/images/november2020/welcome.png" class="w-full max-w-md">
                        </div>

                    </div>
                </div>
            </section>
        @elseif (lolos(auth()->user()->biodata->tim->id) == 0)
        <section class="block py-24 leading-7 text-left text-gray-900 bg-white">
            <div class="relative w-full px-5 px-8 mx-auto leading-7 text-gray-900 max-w-7xl lg:px-16 xl:px-32">
                <div class="flex flex-col flex-wrap items-center text-left md:flex-row">

                    <div class="flex-1 opacity-100 xl:pr-12 transform-none">
                        <h1 class="box-border mt-0 text-4xl font-normal tracking-tight text-center text-gray-900 sm:text-5xl md:text-4xl lg:text-5xl mb-7 md:text-left">
                             <span class="text-red-600">Maaf Sobat Prestasi</span>
                        </h1>

                        <!-- Text -->
                        <p class="box-border mt-0 mb-8 text-base font-normal text-center text-gray-500 lg:text-xl md:text-left lg:mb-8">
                            Tim kamu belum berhasil melanjutkan hingga tingkat nasional. Tetap semangat ya Sobat Prestasi
                        </p>

                    </div>

                    <div class="relative flex justify-center flex-1 w-full px-5 mt-16 leading-7 text-gray-900 md:justify-end md:mt-0">
                        <!-- Image -->
                        <img src="https://cdn.devdojo.com/images/november2020/welcome.png" class="w-full max-w-md">
                    </div>

                </div>
            </div>
        </section>
        @else
        @endif
        

        <!--/ quick actions -->

        

      </div>
    </div>
    <!--/ main content -->
  </div>
@endsection