@extends('layouts.admin')
@section('title','Kendala')
@section('content')
<div class="flex-1 flex flex-col bg-blue-50 py-4 lg:py-8 px-4 lg:px-6 xl:px-8 overflow-hidden">

    <!-- topbar -->
    <div class="max-w-screen-2xl w-full mx-auto flex justify-between">
      <div class="hidden md:block">
        <h1 class="text-2xl mb-1 font-bold text-blue-800">Kendala</h1>
        
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
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">NISN</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Kode</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Nama</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Judul</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">WA</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Bidang</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Status</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Aksi</th>
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
       url: "{{ route('kendala.index') }}",
      },
      columns:[
       {
        data: 'nisn',
        name: 'nisn'
       },
       {
        data: 'kode',
        name: 'kode'
       },
       {
        data: 'nama',
        name: 'nama'
       },
       {
        data: 'judul',
        name: 'judul'
       },
       {
        data: 'wa',
        name: 'wa'
       },
       {
        data: 'bidang.nama_bidang',
        name: 'bidang.nama_bidang'
       },
       {
        data: 'statuss',
        name: 'statuss',
        searchable: false,
        orderable: false
       },
       {
        data: 'edit',
        name: 'edit',
        searchable: false,
        orderable: false
       }
       
      ]
     });
    });
</script>
@endsection