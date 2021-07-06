@extends('layouts.frontend')
@section('title','Narahubung')
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
            <div class="col-md-5">
                <h1 class="title-section">Narahubung</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 mx-auto">
                <img src="{{ asset('assets/images/narahubung.jpg') }}" alt="" style="display: block; width: 100%;"/>
            </div>
        </div>
    </div>
</section>
@endsection