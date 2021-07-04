@extends('layouts.anggota')
@section('title','Akun')
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
        @if(session('sukses'))
        <div class="block text-sm text-white bg-blue-900 border border-blue-800 h-12 flex items-center p-4 rounded-sm relative" role="alert">
            <strong class="mr-1">Berhasil memperbarui data</strong>
            <button type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
                <span class="absolute top-0 bottom-0 right-5 text-2xl px-3 py-1 hover:text-blue-500" aria-hidden="true" >×</span>
            </button>
          </div>
        @endif
        <form id="validate_form" method="POST" action="{{route('akun.anggota.save')}}">
            @method('PUT')
            @csrf
            <div class="bg-white rounded-lg px-4 lg:px-8 py-4 lg:py-6 mt-8">
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="name">
                        Nama
                    </label>
                    <input type="text" name="name" value="{{$user->name}}" placeholder="Nama" required data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="email">
                        Email
                    </label>
                    <input type="email" name="email" value="{{$user->email}}" placeholder="Nama" required data-parsley-type="email" data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="password">
                        Kata Sandi
                    </label>
                    <input type="password" name="password" id="password" placeholder="Kata Sandi" data-parsley-minlength="8" autocomplete="new-password" data-parsley-trigger="keyup" class="bg-white mt-1 rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
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