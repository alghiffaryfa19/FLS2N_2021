@extends('layouts.frontend')
@section('title',$detail->judul)
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
    <div style="margin-top: 20px" class="container">
		<div>
			<h4 class="title-orange-bold">{{$detail->judul}}</h4>
			<span class="badge badge-pill badge-primary text-white">{{$detail->user->name}}</span>
			<div style="margin-top: 20px" class="embed-responsive embed-responsive-16by9">
				<iframe style="width: 100%" class="embed-responsive-item" src="{{embed_video($detail->url)}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
			
		</div>
	</div>
</section>
@endsection