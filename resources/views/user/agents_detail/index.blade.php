@extends('layouts.app', ['layout_class' => 'contact', 'title' => trans('app.where_to_buy.title')])

@section('content')
    <section class="sub-header shop-layout-1">
        <img class="rellax bg-overlay" src="{{ asset($image_agent->imageUrl()) }}" alt="">
        <div class="overlay-call-to-action"></div>
        <h3 class="heading-style-3">{{ trans('app.where_to_buy.title') }}</h3>
    </section>

    <section class="boxed-sm">
        <div class="container">
            <div class="row">
                <div class="row icon-box-contact-wrapper">
                    <div class="row main">
                    <div class="col-md-4">
                        <div class="icon-box">
                        <i class="fa fa-map-marker"></i>
                        <p>{{$data["address"]}}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- <a class="icon-box" href="tel:0123456789 " style="padding : 52px"> -->
                        <a class="icon-box" href="tel:{{$data["phone"]}} ">
                        <i class="fa fa-mobile"></i>{{$data["phone"]}}</a>
                    </div>
                    <div class="col-md-4">
                        <!-- <a class="icon-box" href="tel:0123456789 " style="padding : 52px"> -->
                        <a class="icon-box" href="tel:{{$data["email"]}} ">
                        <i class="fa fa-envelope-o"></i> {{$data["email"]}} </a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
