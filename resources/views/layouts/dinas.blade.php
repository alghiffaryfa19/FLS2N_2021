<!DOCTYPE html>
<html lang="en"><head>
  
  <title>@yield('title')</title>
  <meta charset="utf-8" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="Accept-CH" content="DPR,Width,Viewport-Width" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"  />
  <script src="{{asset('superadmin/js/jquery.min.js')}}"></script>
  <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.1.0/dist/chart.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
  <script src="{{ asset('js/select2.min.js') }}" defer></script>
  <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
  <!--Responsive Extension Datatables CSS-->
  <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
  <link href="//cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
  <script src="//cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
  {{-- <link rel="stylesheet" href="./css/main.css"> --}}
  <link rel="stylesheet" href="{{asset('css/app.css')}}">

  <script src="//parsleyjs.org/dist/parsley.js"></script>
  @yield('style')
  <style>
    input.parsley-success,
    select.parsley-success,
    textarea.parsley-success {
      color: #468847;
      background-color: #DFF0D8;
      border: 1px solid #D6E9C6;
    }
  
    input.parsley-error,
    select.parsley-error,
    textarea.parsley-error {
      color: #B94A48;
      background-color: #F2DEDE;
      border: 1px solid #EED3D7;
    }
  
    .parsley-errors-list {
      margin: 2px 0 3px;
      padding: 0;
      list-style-type: none;
      font-size: 0.9em;
      line-height: 0.9em;
      opacity: 0;
  
      transition: all .3s ease-in;
      -o-transition: all .3s ease-in;
      -moz-transition: all .3s ease-in;
      -webkit-transition: all .3s ease-in;
    }
  
    .parsley-errors-list.filled {
      opacity: 1;
    }
    
    .parsley-type, .parsley-required, .parsley-equalto, .parsley-pattern, .parsley-length{
     color:#ff0000;
    }
    
</style>
<style>
  /*Overrides for Tailwind CSS */
  /*Form fields*/
  
  .dataTables_wrapper select,
  .dataTables_wrapper .dataTables_filter input {
      color: #4a5568;
      /*text-gray-700*/
      padding-left: 1rem;
      /*pl-4*/
      padding-right: 1rem;
      /*pl-4*/
      padding-top: .5rem;
      /*pl-2*/
      padding-bottom: .5rem;
      /*pl-2*/
      line-height: 1.25;
      /*leading-tight*/
      border-width: 2px;
      /*border-2*/
      border-radius: .25rem;
      border-color: #edf2f7;
      /*border-gray-200*/
      background-color: #edf2f7;
      /*bg-gray-200*/
  }
  /*Row Hover*/
  
  table.dataTable.hover tbody tr:hover,
  table.dataTable.display tbody tr:hover {
      background-color: #ebf4ff;
      /*bg-indigo-100*/
  }
  /*Pagination Buttons*/
  
  .dataTables_wrapper .dataTables_paginate .paginate_button {
      font-weight: 700;
      /*font-bold*/
      border-radius: .25rem;
      /*rounded*/
      border: 1px solid transparent;
      /*border border-transparent*/
  }
  /*Pagination Buttons - Current selected */
  
  .dataTables_wrapper .dataTables_paginate .paginate_button.current {
      color: #fff !important;
      /*text-white*/
      box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
      /*shadow*/
      font-weight: 700;
      /*font-bold*/
      border-radius: .25rem;
      /*rounded*/
      background: #667eea !important;
      /*bg-indigo-500*/
      border: 1px solid transparent;
      /*border border-transparent*/
  }
  /*Pagination Buttons - Hover */
  
  .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
      color: #fff !important;
      /*text-white*/
      box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
      /*shadow*/
      font-weight: 700;
      /*font-bold*/
      border-radius: .25rem;
      /*rounded*/
      background: #667eea !important;
      /*bg-indigo-500*/
      border: 1px solid transparent;
      /*border border-transparent*/
  }
  /*Add padding to bottom border */
  
  table.dataTable.no-footer {
      border-bottom: 1px solid #e2e8f0;
      /*border-b-1 border-gray-300*/
      margin-top: 0.75em;
      margin-bottom: 0.75em;
  }
  /*Change colour of responsive icon*/
  
  table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
  table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
      background-color: #667eea !important;
      /*bg-indigo-500*/
  }
</style>
</head>
<body class="font-sans">
    <div id="content">
<div>
  
  
<div class="flex flex-col lg:flex-row min-h-screen font-semibold text-blue-900 text-base subpixel-antialiased">

  <!-- mobile bar -->
  <div class="bg-blue-900 py-2 px-4 flex items-center justify-between lg:hidden text-blue-100">
    <button id="menuToggle">
      <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
      </svg>
    </button>
    <a href="#" class="block -mr-8">
      <img src="{{asset('assets/images/logo.png')}}" alt="kopsi" class="block h-10 w-auto fill-current text-gray-600" />
    </a>
    <button
      class="flex flex-row items-center justify-center xl:justify-start space-x-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
      
    </button>
  </div>
  <!--/ mobile bar-->

  <!--- sidebar -->
  <div id="menu" class="bg-white w-54 xl:w-64 2xl:w-80 px-4 lg:px-6 xl:px-8 py-4 lg:py-6 sticky top-0 hidden lg:flex flex-col shadow-inner h-screen border-l-8 border-blue-900 z-10">
    
    <!-- menu and logo-->
    <div class="flex-1 py-2">
      {{-- <a href="#" class="hidden md:block">
        <img src="{{asset('fls2n/logo.png')}}" alt="kopsi" class="block h-20 w-auto fill-current text-gray-600" />
      </a> --}}
      <nav class="md:mt-2 -mx-2">
        <ul class="text-base pt-2 space-y-3">
          <li>
            <a href="{{route('dinas')}}" class="bg-white hover:bg-blue-50 transition-colors duration-100 text-blue-800 flex items-end py-3 px-4 space-x-2 rounded-lg font-bold">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
              </svg>
              <span class="flex-1">
                Dashboard
              </span>
            </a>
          </li>
          <li>
            <a href="{{route('peserta-dinas')}}" class="bg-white hover:bg-blue-50 transition-colors duration-100 text-blue-800 flex items-end py-3 px-4 space-x-2 rounded-lg font-bold">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
              </svg>
              <span class="flex-1">
                Peserta
              </span>
            </a>
          </li>
         
          <li>
            <form method="POST" action="{{ route('logout') }}">
              @csrf

              <a href="{{route('logout')}}" onclick="event.preventDefault();
              this.closest('form').submit();" class="bg-white hover:bg-blue-50 transition-colors duration-100 text-blue-800 flex items-end py-3 px-4 space-x-2 rounded-lg font-bold text-opacity-70 hover:text-opacity-100">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z" clip-rule="evenodd"></path>
                </svg>
                <span class="flex-1">
                Logout
                </span>
              </a>
            </form>
            
          </li>
        </ul>
      </nav>
    </div>

  </div>
  <!--/ sidebar -->

  @yield('content')
</div>


<!-- JavaScript -->
<script>

  // Very simple example for toggling mobile menu 

  const button = document.getElementById('menuToggle');
  const menu = document.getElementById('menu');
  const body = document.getElementsByTagName('body')

  button.onclick = function (event) {
    event.preventDefault();

    menu.classList.toggle('hidden')
    body[0].classList.toggle('overflow-hidden')

  }
</script>
<!--/ JavaScript -->
  
</div>

        </div>



{{-- <script type="text/javascript" src="./js/app.bundle.min.js"></script> --}}
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
@yield('script')
<script>
    $(document).ready(function(){
    
     $('#validate_form').parsley();
    
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.rt_rw').mask('000/000');
    });
</script>
<script type="text/javascript">
  $(document).ready(function() {
  $('.summernote').summernote({
      height: 200,
  });
});
</script>
</body>
</html>
