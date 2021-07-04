@extends('layouts.frontend')
@section('title',$detail->judul)
@section('content')
<section>
    <div class="container">            
        <div class="row">
            <div class="col-md-12 ">
                <div class="detail-berita">
                    <div class="card">
                        <img src="{{asset('uploads/'.$detail->thumbnail)}}" alt="">
                        <div class="text-berita">                                
                            <h4>{{$detail->judul}}</h4>
                            <small class="text-span text-muted"><i class="fas fa-user"></i> {{$detail->user->name}} | <i class="fas fa-calendar-day"></i> {{\Carbon\Carbon::parse($detail->created_at)->format('d M Y')}}</small>
                            <p>{!!$detail->content!!}</p>                                
                        </div>                            
                    </div>                        
                </div>
            </div>
        </div>            
    </div>
</section>
@endsection