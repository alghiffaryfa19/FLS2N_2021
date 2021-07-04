@extends('layouts.frontend')
@section('title','FAQ')
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
                <h1 class="title-section">FAQ</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 ">
                <div class="accordion" id="accordionExample">
                    @foreach ($faq as $item)
                    <div class="card">
                        <div class="card-header" id="headingOne{{$item->id}}">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne{{$item->id}}" aria-expanded="true" aria-controls="collapseOne{{$item->id}}">
                                {{$item->question}}
                            </button>
                          </h2>
                        </div>
                    
                        <div id="collapseOne{{$item->id}}" class="collapse" aria-labelledby="headingOne{{$item->id}}" data-parent="#accordionExample">
                          <div class="card-body">
                            {!!$item->answer!!}
                          </div>
                        </div>
                      </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection