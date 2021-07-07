@extends('layouts.frontend')
@section('title',$detail->nama_bidang)
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
<section>
    <div class="container">            
        <div class="row">
            <div class="col-md-12 ">
                <div class="detail-berita">
                    <div class="card">
                        <img src="{{asset('uploads/'.$detail->icon)}}" alt="">
                        <div class="berita-detail">                                
                            <h4>{{$detail->nama_bidang}}</h4>
                            <small class="text-span text-muted">{{$detail->kategori->nama_kategori}}</small>
                            <p>{!!$detail->detail!!}</p>                                
                        </div>                            
                    </div>                        
                </div>
            </div>
        </div>            
    </div>
</section>
@endsection