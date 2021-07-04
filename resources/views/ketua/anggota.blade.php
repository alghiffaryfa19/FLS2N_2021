@extends('layouts.ketua')
@section('title','Anggota')
@section('content')
<div class="flex-1 flex flex-col bg-blue-50 py-4 lg:py-8 px-4 lg:px-6 xl:px-8 overflow-hidden">

    <!-- topbar -->
    <div class="max-w-screen-2xl w-full mx-auto flex justify-between">
      <div class="hidden md:block">
        <h1 class="text-2xl mb-1 font-bold text-blue-800">Anggota</h1>
      </div>
    </div>
    <!--/ topbar -->

    <!-- main content -->
    <div class="flex-1 py-4 lg:py-10">
      <div class="max-w-screen-2xl mx-auto">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        @if(session('sukses'))
        <div class="block text-sm text-white bg-blue-900 border border-blue-800 h-12 flex items-center p-4 rounded-sm relative" role="alert">
            <strong class="mr-1">Berhasil memperbarui data</strong>
            <button type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
                <span class="absolute top-0 bottom-0 right-5 text-2xl px-3 py-1 hover:text-blue-500" aria-hidden="true" >×</span>
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
        
        @if (!empty($anggota))
        <div class="bg-white rounded-lg px-4 lg:px-8 py-4 lg:py-6 mt-8">
            <div class="flex justify-center mt-3">
                @if (empty($anggota->foto))
                    <img style="height: 200px;width: 200px; object-fit: cover" alt="{{$anggota->nisn}}" class="rounded-full" src="{{asset('dist/images/profile-2.jpg')}}">
                @else
                    <img style="height: 200px;width: 200px; object-fit: cover" alt="{{$anggota->nisn}}" class="rounded-full" src="{{asset('uploads/'.$anggota->foto)}}">
                @endif
            </div>
            <div class="flex justify-center mt-3">
                <h6>{{$anggota->user->name}}</h6>
            </div>
            
        </div>
        @else
        <h3>Belum ada anggota</h3>
        @endif
        

      </div>
    </div>
    <!--/ main content -->
  </div>
@endsection