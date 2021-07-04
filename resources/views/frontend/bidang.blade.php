@extends('layouts.frontend')
@section('title','Bidang')
@section('style')
    <style>
        .banner{
            background-color: #00ADEE !important;
        }
        .navbar-dark .nav-link {
            color: #fff !important;
        }
    </style>
@endsection
@section('content')
@foreach ($kategori as $item)
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h1 class="title-section">{{$item->nama_kategori}}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 ">
                <div class="berita">
                    @foreach ($item->bidang as $items)
                    <div id="{{$items->nama_bidang}}" class="card">
                        <img src="{{asset('uploads/'.$items->icon)}}" alt="">
                        <div class="text-berita">
                            <h4>{{$items->nama_bidang}}</h4>
                            <p>{{$items->detail}}</p>
                        </div>                            
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
@endsection