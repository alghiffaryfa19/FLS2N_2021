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
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
  <script src="{{ asset('js/select2.min.js') }}" defer></script>
  
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
            <a href="{{route('ketua')}}" class="bg-white hover:bg-blue-50 transition-colors duration-100 text-blue-800 flex items-end py-3 px-4 space-x-2 rounded-lg font-bold">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
              </svg>
              <span class="flex-1">
                Dashboard
              </span>
            </a>
          </li>
          <li>
            <a href="{{route('akun.ketua')}}" class="bg-white hover:bg-blue-50 transition-colors duration-100 text-blue-800 flex items-end py-3 px-4 space-x-2 rounded-lg font-bold text-opacity-70 hover:text-opacity-100">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                  clip-rule="evenodd"></path>
              </svg>
              <span class="flex-1">
                Akun
              </span>
            </a>
          </li>
          <li>
            <a href="{{route('biodata.ketua')}}" class="bg-white hover:bg-blue-50 transition-colors duration-100 text-blue-800 flex items-end py-3 px-4 space-x-2 rounded-lg font-bold text-opacity-70 hover:text-opacity-100">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                  clip-rule="evenodd"></path>
              </svg>
              <span class="flex-1">
                Biodata
              </span>
            </a>
          </li>
          <li>
            <a href="{{route('sekolah')}}" class="bg-white hover:bg-blue-50 transition-colors duration-100 text-blue-800 flex items-end py-3 px-4 space-x-2 rounded-lg font-bold text-opacity-70 hover:text-opacity-100">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z" clip-rule="evenodd"></path>
              </svg>
              <span class="flex-1">
                Sekolah
              </span>
            </a>
          </li>
          <li>
            <a href="{{route('lomba')}}" class="bg-white hover:bg-blue-50 transition-colors duration-100 text-blue-800 flex items-end py-3 px-4 space-x-2 rounded-lg font-bold text-opacity-70 hover:text-opacity-100">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path>
              </svg>
              <span class="flex-1">
                Lomba
              </span>
            </a>
          </li>
          <li>
            <a href="{{route('orangtua.ketua')}}" class="bg-white hover:bg-blue-50 transition-colors duration-100 text-blue-800 flex items-end py-3 px-4 space-x-2 rounded-lg font-bold text-opacity-70 hover:text-opacity-100">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
              </svg>
              <span class="flex-1">
                Orang Tua
              </span>
            </a>
          </li>
          @if (cek_berkelompok(auth()->user()->biodata->tim->bidang_provinsi->bidang->id) == 1)
          <li>
            <a href="{{route('anggota')}}" class="bg-white hover:bg-blue-50 transition-colors duration-100 text-blue-800 flex items-end py-3 px-4 space-x-2 rounded-lg font-bold text-opacity-70 hover:text-opacity-100">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
              </svg>
              <span class="flex-1">
                Anggota
              </span>
            </a>
          </li>
          @endif
          <li>
            <a href="{{route('pembimbing')}}" class="bg-white hover:bg-blue-50 transition-colors duration-100 text-blue-800 flex items-end py-3 px-4 space-x-2 rounded-lg font-bold text-opacity-70 hover:text-opacity-100">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
              </svg>
              <span class="flex-1">
                Pembimbing
              </span>
            </a>
          </li>
          
          <li>
            <a href="{{route('berkas.index')}}" class="bg-white hover:bg-blue-50 transition-colors duration-100 text-blue-800 flex items-end py-3 px-4 space-x-2 rounded-lg font-bold text-opacity-70 hover:text-opacity-100">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z" clip-rule="evenodd"></path>
              </svg>
              <span class="flex-1">
                Berkas
              </span>
            </a>
          </li>
          <li>
            <a href="{{route('karya-provinsi.index')}}" class="bg-white hover:bg-blue-50 transition-colors duration-100 text-blue-800 flex items-end py-3 px-4 space-x-2 rounded-lg font-bold text-opacity-70 hover:text-opacity-100">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z" clip-rule="evenodd"></path>
              </svg>
              <span class="flex-1">
                Karya
              </span>
            </a>
          </li>
          @if (lolos(auth()->user()->biodata->tim->id) == 1)
          <li>
            <a href="#" class="bg-white hover:bg-blue-50 transition-colors duration-100 text-blue-800 flex items-end py-3 px-4 space-x-2 rounded-lg font-bold text-opacity-70 hover:text-opacity-100">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z" clip-rule="evenodd"></path>
              </svg>
              <span class="flex-1">
                Karya Nasional
              </span>
            </a>
          </li>
          @endif
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
</body>
</html>
