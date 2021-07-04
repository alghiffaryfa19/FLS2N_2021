@extends('layouts.admin')
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
        <div class="form-input">
            <a href="{{route('export')}}"  class="bg-yellow-600 py-2 px-8 shadow-md rounded text-white mr-5">Export</a>
            <a href="{{route('grafik')}}"  class="bg-yellow-600 py-2 px-8 shadow-md rounded text-white mr-5">Grafik</a>
            <a href="{{route('geospasial')}}"  class="bg-yellow-600 py-2 px-8 shadow-md rounded text-white mr-5">Geospasial</a>
        </div>
        <div class="p-5" id="bordered-table">
            <div class="preview">
                <div class="overflow-x-auto">
                    <table style="width: 100%" class="table-fixed">
                        <thead>
                          <tr>
                            <th class="px-4 py-2 text-green-600">Provinsi</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($provinsi as $item)
                            <tr>
                                <td rowspan="{{count($item->bidang_provinsi)+1}}" class="border text-center border-green-500 px-4 py-2 text-green-600 font-medium">{{$item->name}}</td>
                                <td class="border border-green-500 px-4 py-2 text-green-600 font-medium">Bidang</td>
                                <td class="border border-green-500 px-4 py-2 text-green-600 font-medium">Pendaftar</td>
                                <td class="border border-green-500 px-4 py-2 text-green-600 font-medium">Pengunggah</td>
    
                            </tr>
                                @foreach ($item->bidang_provinsi as $items)
                                <tr>
                                    <td class="border border-green-500 px-4 py-2 text-green-600 font-medium">{{$items->bidang->nama_bidang}}</td>
                                    <td class="border border-green-500 px-4 py-2 text-green-600 font-medium">{{$items->tim_count}}</td>
                                    <td class="border border-green-500 px-4 py-2 text-green-600 font-medium">{{$items->pengunggah_count}}</td>
                                </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
    </div>
      </div>
    </div>
    <!--/ main content -->
  </div>
@endsection