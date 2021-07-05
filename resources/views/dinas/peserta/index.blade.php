@extends('layouts.dinas')
@section('title','Peserta')
@section('content')
<div class="flex-1 flex flex-col bg-blue-50 py-4 lg:py-8 px-4 lg:px-6 xl:px-8 overflow-hidden">

    <!-- topbar -->
    <div class="max-w-screen-2xl w-full mx-auto flex justify-between">
      <div class="hidden md:block">
        <h1 class="text-2xl mb-1 font-bold text-blue-800">Peserta Provinsi {{auth()->user()->dinas->province->name}}</h1>
        
      </div>
    </div>
    <!--/ topbar -->

    <!-- main content -->
    <div class="flex-1 py-4 lg:py-10">
      <div class="max-w-screen-2xl mx-auto">
        <div class="p-5" id="bordered-table">
            <div class="preview">
                <div class="overflow-x-auto">
                    <table id="example" class="table">
                        <thead>
                            <tr>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Ketua</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Sekolah</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Bidang</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Lolos Adm</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Berkas</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Karya</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Detail</th>
                            </tr>
                        </thead>
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
    $(document).ready(function(){
      var id = $(this).attr('id');
     $('#example').DataTable({
      processing: true,
      stateSave: true,
      serverSide: true,
      ajax:{
       url: "{{ route('peserta-dinas') }}",
      },
      columns:[
       {
        data: 'biodata.user.name',
        name: 'biodata.user.name'
       },
       {
        data: 'sekolah.nama_sekolah',
        name: 'sekolah.nama_sekolah'
       },
       {
        data: 'bidang_provinsi.bidang.nama_bidang',
        name: 'bidang_provinsi.bidang.nama_bidang'
       },
       {
        data: 'st',
        name: 'st',
        orderable: false,
        searchable: false,
       },
       {
        data: 'berkas',
        name: 'berkas',
        orderable: false,
        searchable: false,
       },
       {
        data: 'karya',
        name: 'karya',
        orderable: false,
        searchable: false,
       },
       {
        data: 'edit',
        name: 'edit',
        orderable: false,
        searchable: false,
       }
       
      ]
     });
    });
</script>
@endsection