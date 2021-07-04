<x-guest-layout>
    <section class="relative" style="background-image: url('https://cdn.devdojo.com/images/february2021/directory-bg.jpg')">
        <div class="absolute inset-0 bg-gradient-to-b from-black to-transparent opacity-30"></div>
    
        <div class="relative z-20 px-4 py-24 mx-auto text-center text-white max-w-7xl lg:py-32">
            <div class="flex flex-wrap text-white">
                <div class="relative w-full px-4 mx-auto text-center xl:flex-grow-0 xl:flex-shrink-0">
    
                    <h1 class="mt-0 mb-2 text-4xl font-bold text-white sm:text-5xl lg:text-7xl">Daftar FLS2N {{$jenjang->nama}}</h1>
                    <p class="mt-0 mb-4 text-base text-white sm:text-lg lg:text-xl">
                        Festival Lomba dan Seni Siswa Nasional
                    </p>
    
                </div>
            </div>
        </div>
    
        <div class="relative z-30 h-48 px-10 bg-white lg:h-32">
            <form action="{{route('daftar')}}" method="POST" class="flex flex-col items-center h-auto max-w-lg p-6 mx-auto space-y-3 overflow-hidden transform -translate-y-12 bg-white rounded-lg shadow-md lg:h-24 lg:max-w-6xl lg:flex-row lg:space-y-0 lg:space-x-3">
                @csrf
                <input type="hidden" name="jenjang" value="{{$jenjang->id}}">
                <div class="w-full h-12 border-2 border-gray-200 rounded-lg lg:border-0 lg:w-auto lg:flex-1">
                    <input type="number" id="nisn" name="nisn" class="w-full h-full px-4 font-medium text-gray-700 rounded-lg sm:text-lg focus:bg-gray-50 focus:outline-none" placeholder="Nomor Induk Siswa Nasional (NISN)">
                </div>
                <div class="w-full h-full lg:w-auto">
                    <button type="submit" class="inline-flex items-center justify-center w-full h-full px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 lg:w-64">Cari</button>
                </div>
            </form>
        </div>
    
    </section>
    @if(session('nisn_not_found'))
    <section class="py-20 bg-gray-50">
        <div class="container items-center max-w-6xl px-4 px-10 mx-auto sm:px-20 md:px-32 lg:px-16">
        <div class="flex flex-wrap items-center -mx-3">
            <div class="order-1 w-full px-3 lg:w-1/2 lg:order-0">
            <div class="w-full lg:max-w-md">
                <h2 class="mb-4 text-3xl font-bold leading-tight tracking-tight sm:text-4xl font-heading">Halo Sobat Prestasi, Maaf...</h2>
                <p class="mb-4 font-medium tracking-tight text-gray-400 xl:mb-6">Data NISN/Nomor Induk sobat prestasi tidak ditemukan, mohon segera melapor ke operator dapodik sekolah, agar sobat prestasi segera bisa mendaftar ajang prestasi ini. Berikut kami sertakan <a class="text-blue-500" href="#">tautan pengurusan</a>  </p>
            </div>
            </div>
            <div class="w-full px-3 mb-12 lg:w-1/2 order-0 lg:order-1 lg:mb-0"><img class="mx-auto sm:max-w-sm lg:max-w-full" src="https://cdn.devdojo.com/images/november2020/feature-graphic.png" alt="feature image"></div>
        </div>
        </div>
    </section>
    @endif
    @if(session('kelas'))
    <section class="py-20 bg-gray-50">
        <div class="container items-center max-w-6xl px-4 px-10 mx-auto sm:px-20 md:px-32 lg:px-16">
        <div class="flex flex-wrap items-center -mx-3">
            <div class="order-1 w-full px-3 lg:w-1/2 lg:order-0">
            <div class="w-full lg:max-w-md">
                <h2 class="mb-4 text-3xl font-bold leading-tight tracking-tight sm:text-4xl font-heading">Halo Sobat Prestasi, Maaf...</h2>
                <p class="mb-4 font-medium tracking-tight text-gray-400 xl:mb-6">Pada data kami, sobat prestasi masih kelas {{ session()->get( 'kelas' ) }}, ajang prestasi ini hanya diperuntukan bagi siswa Pendidikan Menengah SMA dan MA, silahkan kunjungi <a class="text-yellow-500" target="_blank" href="https://pusatprestasinasional.kemdikbud.go.id">Portal Pusat Prestasi Nasional</a> untuk mendapatkan informasi ajang prestasi yang sesuai dengan jenjang sobat prestasi</p>
            </div>
            </div>
            <div class="w-full px-3 mb-12 lg:w-1/2 order-0 lg:order-1 lg:mb-0"><img class="mx-auto sm:max-w-sm lg:max-w-full" src="https://cdn.devdojo.com/images/november2020/feature-graphic.png" alt="feature image"></div>
        </div>
        </div>
    </section>
    @endif
    @if(session('salah_jenjang'))
    <section class="py-20 bg-gray-50">
        <div class="container items-center max-w-6xl px-4 px-10 mx-auto sm:px-20 md:px-32 lg:px-16">
        <div class="flex flex-wrap items-center -mx-3">
            <div class="order-1 w-full px-3 lg:w-1/2 lg:order-0">
            <div class="w-full lg:max-w-md">
                <h2 class="mb-4 text-3xl font-bold leading-tight tracking-tight sm:text-4xl font-heading">Halo Sobat Prestasi, Maaf...</h2>
                <p class="mb-4 font-medium tracking-tight text-gray-400 xl:mb-6">Pada data kami, sobat prestasi merupakan siswa dari {{ session()->get( 'salah_jenjang' ) }}, ajang prestasi ini hanya diperuntukan bagi siswa SMA dan MA, silahkan kunjungi <a class="text-yellow-500" target="_blank" href="https://pusatprestasinasional.kemdikbud.go.id">Portal Pusat Prestasi Nasional</a> untuk mendapatkan informasi ajang prestasi yang sesuai dengan jenjang sobat prestasi</p>
            </div>
            </div>
            <div class="w-full px-3 mb-12 lg:w-1/2 order-0 lg:order-1 lg:mb-0"><img class="mx-auto sm:max-w-sm lg:max-w-full" src="https://cdn.devdojo.com/images/november2020/feature-graphic.png" alt="feature image"></div>
        </div>
        </div>
    </section>
    @endif
</x-guest-layout>
