@extends('layouts.app', ['layout_class' => 'contact', 'title' => trans('app.where_to_buy.title')])

@section('content')

    <section class="sub-header shop-layout-1">
        <img class="rellax bg-overlay" src="{{ asset('images/app/sub-header/01.jpg') }}" alt="">
        <div class="overlay-call-to-action"></div>
        <h3 class="heading-style-3">{{ trans('app.where_to_buy.title') }}</h3>
    </section>

    <section class="boxed-sm">
        <div class="container">
            <div class="row">
                <div class="row icon-box-contact-wrapper">
                    <div class="row main ">
                        @foreach ($agent as $item)
                        <a href="{{route("where_to_buy_detail", ['id'=> $item["id"]])}}">
                        <div class="col-md-4 col-sm-6 mB-10">
                            <div class="icon-box">
                                <i class="fa fa-map-marker"></i>
                                <span> {{$item["address"]}}</span>
                                <span class=""></i>{{$item["phone"]}}</span>
                                <span class=""></i> {{$item["email"]}} </span>
                            </div>
                        </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
