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
        max-height: 700px;
        width: 100%;
        margin: 0 auto;
        object-fit: cover;" src="{{ asset('uploads/'.$item->image) }}" alt="{{$item->title}}" width="1100" height="500"> 
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
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{asset('assets/images/hero-pes-al.png')}}" alt="FL2sn" class="hero-pes-al" />
            </div>
            <div class="col-md-4">
                <div class="txt-pes-al">
                    <h1 class="title-section5">Daftarkan Dirimu Sebagai </h1>
                    <a href="{{route('register')}}" class="peserta">Peserta </a>
                    <a href="{{route('anggotas')}}" class="alumni">Peserta Anggota (Khusus Film Pendek) </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Video -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-4 mt-5 mb-4">
                <h1 class="title-section">Video Pilihan</h1>
            </div>
        </div>
        <div class="row video-pilihan">
            <div class="col-md-12">
                <div id="vid-pil" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">

                        @foreach ($video as $item)

                        <div class="carousel-item {{ $loop->first ? ' active' : '' }}">
                            <a href="{{route('detail_video', $item->slug)}}" class="car-link">
                                <i class="fab fa-youtube"></i>                      
                                <img src="{{thumbnail_video($item->url)}}" class="img-fluid" />
                            </a>                              
                        </div>
                        @endforeach

                    </div>
                    <!-- End Carousel Inner -->


                    <ul class="list-group col-sm-4">
                        @foreach ($video as $item)
                            <li data-target="#vid-pil" data-slide-to="{{$loop->index}}" class="list-group-item {{ $loop->first ? ' active' : '' }}">
                                <h6>{{$item->judul}}</h6>
                                {{-- <span class="txt-span">{{$item->user->name}} | {{\Carbon\Carbon::parse($item->created_at)->format('d M Y')}}</span> --}}
                            </li>
                        @endforeach
                    </ul>

                    <!-- Controls -->
                    <div class="carousel-controls">
                        <a class="left carousel-control" href="#vid-pil" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#vid-pil" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>

                </div>
                <!-- End Carousel -->
            </div>

        </div>
        <div class="row">
            <div class="col-md-12 mt-3">
                <a href="{{route('video')}}" class="float-right btn-selengkapnya mr-3">Selengkapnya</a>
            </div>
        </div>
    </div>
</section>
<!-- INFORMASI TERKINI -->
<!-- <section>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h1 class="title-section">Informasi Terkini</h1>
            </div>
        </div>
        <div class="row">
            @forelse ($info as $item)
            <div class="col-md-4">
                <a @if ($loop->index == 0)
                    class="card-info first"
                @elseif ($loop->index == 1)
                    class="card-info second"
                @else
                    class="card-info third"
                @endif href="{{$item->url}}" target="_blank">
                    {{$item->judul}}
                </a>
            </div>
            @empty
                
            @endforelse
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="float-right">
                    <a href="{{route('informasi')}}" class="btn-selengkapnya mr-3">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- BIDANG LOMBA -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mt-5">
                <img src="{{asset('assets/images/hero-bidang.png')}}" alt="" width="100%" />
            </div>
            <div class="col-md-7 mt-5">
                <h3 class="title-section">Seni Pertunjukan</h3>
                <div class="bidang-menu mt-2">
                    <a href="{{route('bidang')}}/#Baca Puisi" class="card-a">
                        <img src="{{asset('assets/images/icon-bp.png')}}" alt="" />
                        <h5>Baca Puisi</h5>
                    </a>
                    <a href="{{route('bidang')}}/#Gitar Solo" class="card-a">
                        <img src="{{asset('assets/images/icon-gs.png')}}" alt="" />
                        <h5>Gitar Solo</h5>
                    </a>
                    <a href="{{route('bidang')}}/#Monolog" class="card-a">
                        <img src="{{asset('assets/images/icon-mg.png')}}" alt="" />
                        <h5>Monolog</h5>
                    </a>
                    <a href="{{route('bidang')}}/#Tari Kreasi" class="card-a">
                        <img src="{{asset('assets/images/icon-tk.png')}}" alt="" />
                        <h5>Tari Kreasi</h5>
                    </a>
                    <a href="{{route('bidang')}}/#Vokal Solo" class="card-a">
                        <img src="{{asset('assets/images/icon-vs.png')}}" alt="" />
                        <h5>Vokal Solo</h5>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12  mt-5">
                <h2 class="title-section">Seni Penciptaan</h2>
            </div>
            <div class="col-md-12">
                <div class="bidang-menu mt-2">
                    <a href="{{route('bidang')}}/#Desain Poster" class="card-b">
                        <img src="{{asset('assets/images/icon-dp.png')}}" alt="" />
                        <h5>Desain Poster</h5>
                    </a>
                    <a href="{{route('bidang')}}/#Film Pendek" class="card-b">
                        <img src="{{asset('assets/images/icon-fp.png')}}" alt="" />
                        <h5>Film Pendek</h5>
                    </a>
                    <a href="{{route('bidang')}}/#Kriya" class="card-b">
                        <img src="{{asset('assets/images/icon-kr.png')}}" alt="" />
                        <h5>Kriya</h5>
                    </a>
                    <a href="{{route('bidang')}}/#Komik Digital" class="card-b">
                        <img src="{{asset('assets/images/icon-kd.png')}}" alt="" />
                        <h5>Komik Digital</h5>
                    </a>
                    <a href="{{route('bidang')}}/#Cipta Lagu" class="card-b">
                        <img src="{{asset('assets/images/icon-cl.png')}}" alt="" />
                        <h5>Cipta Lagu</h5>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- PENUTUPAN -->
<section>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-5">
                <h1 class="title-section">Penutupan</h1>
                <h1 class="title-section2">Pendaftaran</h1>
                <span class="text-muted txt-span">FLS2N Tingkat Daerah</span>
                <div class="countdown">
                    <div class="time">
                        <h2 id="day"></h2>
                        <span>Hari</span>
                    </div>
                    <div class="time">
                        <h2 id="hour"></h2>
                        <span>Jam</span>
                    </div>
                    <div class="time">
                        <h2 id="minute"></h2>
                        <span>Menit</span>
                    </div>
                    <div class="time">
                        <h2 id="second"></h2>
                        <span>Detik</span>
                    </div>

                </div>
                <a href="{{route('register')}}" class="btn-daftar">Daftar Sekarang</a>
            </div>
            <div class="col-md-6">
                <img src="{{asset('assets/images/hero-countdown.png')}}" alt="" style="display:block; width: 80%; margin: auto;" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">

            </div>
        </div>
    </div>
</section>
<section class="linimasa mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mt-5">
                <h1 class="title-section3">LINIMASA FLS2N</h1>
                <!-- <span class="txt-span">Pelaksanaan FLS2N Tingkat Daerah</span> -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <img src="{{ asset('assets/images/timeline.jpg')}}" alt="" srcset="" style="width: 100%; margin-top: 30px; background-color: #fff; border-radius: 16px;">
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h1 class="title-section4 mb-4">Kabar Seni</h1>
            </div>
        </div>
        <div class="row">
            @forelse ($berita as $item)
            <div class="col-md-4 mb-5">
                <a class="card-berita" href="{{route('detail_berita', $item->slug)}}">
                    <div class="img-square">
                        <img src="{{asset('uploads/'.$item->thumbnail)}}" alt="" srcset="">
                        <h5>{{$item->judul}}</h5>
                    </div>
                </a>
            </div>
            @empty
                <h2>Belum ada berita</h2>
            @endforelse        
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{route('berita')}}" class="float-right btn-selengkapnya mt-5 mr-3">Selengkapnya</a>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    var swiper = new Swiper(".slider-banner", {
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        },
    });
</script>
<script>
    $(document).ready(function() {

        var clickEvent = false;
        $('#vid-pil').carousel({
            interval: 4000
        }).on('click', '.list-group li', function() {
            clickEvent = true;
            $('.list-group li').removeClass('active');
            $(this).addClass('active');
        }).on('slid.bs.carousel', function(e) {
            if (!clickEvent) {
                var count = $('.list-group').children().length - 1;
                var current = $('.list-group li.active');
                current.removeClass('active').next().addClass('active');
                var id = parseInt(current.data('slide-to'));
                if (count == id) {
                    $('.list-group li').first().addClass('active');
                }
            }
            clickEvent = false;
        });
    })


    $(window).on('load', function() {
        var boxheight = $('#vid-pil .carousel-inner').innerHeight();
        var itemlength = $('#vid-pil .carousel-item').length;
        var triggerheight = Math.round(boxheight / itemlength + 1);
        $('#vid-pil .list-group-item').outerHeight(triggerheight);
    });
</script>
<script>
    // Set the date we're counting down to
    var countDownDate = new Date('{{$time->pendaftaran_pengunggahan}}');
    
    // Update the count down every 1 second
    var x = setInterval(function() {
    
      // Get today's date and time
      var now = new Date().getTime();
    
      // Find the distance between now and the count down date
      var distance = countDownDate - now;
    
      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
      // Display the result in the element with id="demo"
      document.getElementById("day").innerHTML = days;
      document.getElementById("hour").innerHTML = hours;
      document.getElementById("minute").innerHTML = minutes;
      document.getElementById("second").innerHTML = seconds;
    
      // If the count down is finished, write some text
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("day").innerHTML = 0;
        document.getElementById("hour").innerHTML = 0;
        document.getElementById("minute").innerHTML = 0;
        document.getElementById("second").innerHTML = 0;
      }
    }, 1000);
</script>
@endsection