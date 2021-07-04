@extends('layouts.frontend')
@section('title','Beranda')
@section('header')
<div id="demo" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
        @foreach( $slider as $item )
      <li data-target="#demo" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                    @endforeach
    </ul>
    <div class="carousel-inner">
        @foreach( $slider as $item )
      <div class="carousel-item {{ $loop->first ? ' active' : '' }}">
        <img style="height: auto;
        max-height: 800px;
        width: 100%;
        margin: 0 auto;
        object-fit: fill;" src="{{ asset('uploads/'.$item->image) }}" alt="{{$item->title}}" width="1100" height="500"> 
      </div>
      @endforeach

      

    </div>
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>
@endsection
@section('content')
<section class="px-2 py-32 bg-white md:px-0">
    <div class="container items-center max-w-6xl px-8 mx-auto xl:px-5">
      <div class="flex flex-wrap items-center sm:-mx-3">
        <div class="w-full md:w-1/2 md:px-3">
          <div class="w-full pb-6 space-y-6 sm:max-w-md lg:max-w-lg md:space-y-4 lg:space-y-8 xl:space-y-9 sm:pr-5 lg:pr-0 md:pb-0">
            <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-4xl lg:text-5xl xl:text-6xl">
              <span class="block xl:inline">Festival Lomba Seni</span>
              <span class="block text-blue-600 xl:inline">Siswa Nasional</span>
            </h1>
            <p class="mx-auto text-base text-gray-500 sm:max-w-md lg:text-xl md:max-w-3xl">#MyDreamMyAdventure #MyTalentMyFuture</p>
            <div class="relative flex flex-col sm:flex-row sm:space-x-4">
              <a href="{{route('register')}}" class="flex items-center w-full px-6 py-3 mb-3 text-lg text-white bg-blue-600 rounded-md sm:mb-0 hover:bg-blue-700 sm:w-auto">
                Daftar
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
              </a>
              <a href="{{route('login')}}" class="flex items-center px-6 py-3 text-gray-500 bg-gray-100 rounded-md hover:bg-gray-200 hover:text-gray-600">
                Masuk
              </a>
            </div>
          </div>
        </div>
        <div class="w-full md:w-1/2">
          <div class="w-full h-auto overflow-hidden rounded-md sm:rounded-xl">
              <img src="{{asset('fls2n/fls2n.png')}}">
            </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Section 3 -->
  <section class="py-20 bg-white">
      <div class="flex flex-col items-start px-10 mx-auto space-y-20 lg:space-y-0 lg:flex-row max-w-7xl">
  
          <div class="flex flex-col justify-center flex-shrink-0 w-full h-full max-w-lg space-y-5 text-gray-800 lg:max-w-none lg:w-5/12 xl:w-6/12">
              <div class="flex items-center space-x-5 text-blue-500">
                  <div class="w-20 h-0.5 bg-blue-500"></div>
                  <p class="text-sm font-bold tracking-wide uppercase">FLS2N 2021</p>
              </div>
              <h2 class="text-4xl font-black xl:text-5xl">Bidang Lomba<br>FLS2N</h2>
              <div class="relative flex flex-col items-start w-full space-y-5 sm:items-center sm:flex-row sm:space-y-0 sm:space-x-3">
                  {{-- <a href="#_" class="inline-block w-full px-6 py-4 font-bold text-center text-white bg-blue-600 rounded sm:w-auto">Get Started</a>
                  <a href="#_" class="flex items-center px-2 py-2 space-x-3 text-base font-bold hover:underline">
                      <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                      <span>Read Customer Stories</span>
                  </a> --}}
              </div>
          </div>
  
          <div class="max-w-lg lg:max-w-none lg:w-7/12 lg:pl-8 xl:w-6/12">
              <div class="grid grid-cols-3 text-gray-400 gap-x-12 gap-y-16">
                  <a href="#_" class="flex items-center justify-center hover:text-gray-600">
                      <img src="{{asset('fls2n/bacapuisi.png')}}" alt="kopsi" class="block h-20 w-auto fill-current text-gray-600" />
                  </a>
                  <a href="#_" class="flex items-center justify-center hover:text-gray-600">
                      <img src="{{asset('fls2n/gitarsolo.png')}}" alt="kopsi" class="block h-20 w-auto fill-current text-gray-600" />   
                  </a>
                  <a href="#_" class="flex items-center justify-center hover:text-gray-600">
                      <img src="{{asset('fls2n/monolog.png')}}" alt="kopsi" class="block h-20 w-auto fill-current text-gray-600" /></a>
                  <a href="#_" class="flex items-center justify-center hover:text-gray-600">
                      <img src="{{asset('fls2n/tarikreasi.png')}}" alt="kopsi" class="block h-20 w-auto fill-current text-gray-600" /></a>
                  <a href="#_" class="flex items-center justify-center hover:text-gray-600">
                      <img src="{{asset('fls2n/vokalsolo.png')}}" alt="kopsi" class="block h-20 w-auto fill-current text-gray-600" /></a>
                  <a href="#_" class="flex items-center justify-center hover:text-gray-600">
                      <img src="{{asset('fls2n/desainposter.png')}}" alt="kopsi" class="block h-20 w-auto fill-current text-gray-600" /></a>
                  <a href="#_" class="flex items-center justify-center hover:text-gray-600">
                      <img src="{{asset('fls2n/filmpendek.png')}}" alt="kopsi" class="block h-20 w-auto fill-current text-gray-600" /></a>
                  <a href="#_" class="flex items-center justify-center hover:text-gray-600">
                      <img src="{{asset('fls2n/kriya.png')}}" alt="kopsi" class="block h-20 w-auto fill-current text-gray-600" /></a>
                  <a href="#_" class="flex items-center justify-center hover:text-gray-600">
                      <img src="{{asset('fls2n/komikdigital.png')}}" alt="kopsi" class="block h-20 w-auto fill-current text-gray-600" />
                  </a>
                  <a href="#_" class="flex items-center justify-center hover:text-gray-600">
                      <img src="{{asset('fls2n/ciptalagu.png')}}" alt="kopsi" class="block h-20 w-auto fill-current text-gray-600" />
                  </a>
              </div>
          </div>
  
      </div>
  </section>
  
  <!-- Section 4 -->
  
  
  <!-- Section 5 -->
  <section class="bg-white">
      <div class="flex flex-col items-center justify-center px-5 py-20 mx-auto max-w-7xl md:px-0">
          <div class="relative">
              <h1 class="relative text-5xl font-black text-transparent bg-center bg-cover bg-gradient-to-br from-blue-400 via-blue-600 to-blue-500 lg:text-6xl bg-clip-text" style="background-image:url('https://cdn.devdojo.com/images/february2021/bg-colorful.jpg')">Daftar Sekarang</h1>
          </div>
          <p class="mt-3 text-xl text-gray-500 lg:text-2xl">#SeniPulihkanNegri</p>
          <a href="{{route('register')}}" class="flex items-center justify-center flex-shrink-0 h-12 px-4 py-2 text-white rounded-lg cursor-pointer bg-gradient-to-r from-blue-500 to-blue-600">Daftar</a>
      </div>
  </section>
@endsection