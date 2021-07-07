@extends('layouts.dinas')
@section('title','Dashboard')
@section('content')
<div class="flex-1 flex flex-col bg-blue-50 py-4 lg:py-8 px-4 lg:px-6 xl:px-8 overflow-hidden">

    <!-- topbar -->
    <div class="max-w-screen-2xl w-full mx-auto flex justify-between">
      <div class="hidden md:block">
        <h1 class="text-2xl mb-1 font-bold text-blue-800">Selamat Datang {{auth()->user()->name}}</h1>
        
      </div>
    </div>
    <!--/ topbar -->

    <!-- main content -->
    <div class="flex-1 py-4 lg:py-10">
      <div class="max-w-screen-2xl mx-auto">
        <div class="p-5" id="bordered-table">
            <div class="preview">
                <div class="overflow-x-auto">
                    <table style="width: 100%" class="table-fixed">
                        <thead>
                          <tr>
                            <th class="border border-green-500 px-4 py-2 text-green-600 font-medium">Provinsi</th>
                            <th class="border border-green-500 px-4 py-2 text-green-600 font-medium">Bidang</th>
                            <th class="border border-green-500 px-4 py-2 text-green-600 font-medium">Pendaftar</th>
                            <th class="border border-green-500 px-4 py-2 text-green-600 font-medium">Pengunggah</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($bidang as $items)
                                <tr>
                                    <td class="border border-green-500 px-4 py-2 text-green-600 font-medium">{{$items->province->name}}</td>
                                    <td class="border border-green-500 px-4 py-2 text-green-600 font-medium">{{$items->bidang->nama_bidang}}</td>
                                    <td class="border border-green-500 px-4 py-2 text-green-600 font-medium">{{$items->tim_count}} </td>
                                    <td class="border border-green-500 px-4 py-2 text-green-600 font-medium">{{$items->pengunggah_count}} </td>
                                </tr>
                                
                            @endforeach
                            <tr>
                              <td colspan="2" class="border border-green-500 px-4 py-2 text-green-600 font-medium">Total</td>
                              <td id="total_pendaftar" class="border border-green-500 px-4 py-2 text-green-600 font-medium"></td>
                              <td id="total_pengunggah" class="border border-green-500 px-4 py-2 text-green-600 font-medium"></td>
                          </tr>
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
@section('script')
<script>
  var myOptions = '@php $sum = 0; @endphp @foreach($bidang as $items) @php $sum+=$items->tim_count; @endphp @endforeach  @php echo $sum; @endphp';
  document.getElementById('total_pendaftar').innerHTML = myOptions;
</script>
<script>
  var pengunggah = '@php $sum = 0; @endphp @foreach($bidang as $items) @php $sum+=$items->pengunggah_count; @endphp @endforeach  @php echo $sum; @endphp';
  document.getElementById('total_pengunggah').innerHTML = pengunggah;
</script>
{{-- <script>
  var ang = document.getElementById('tim{{$items->id}}').value;
  angka.push(ang);
</script> --}}
@endsection