@extends('layouts.app', ['layout_class' => 'home-1', 'title' => trans('app.home.title')])

@section('content')
<div class="banner banner-image-fit-screen">
    <div class="rev_slider slider-home-1" id="slider_1">
        <ul>
            <li>
                <img class="rev-slidebg" src="{{ asset($homepage_banner->imageUrl()) }}" alt="" data-bgposition="center center"
                    data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10">
            </li>
        </ul>
    </div>
</div>
<section class="boxed-sm">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 product-category-grid-style-1">
                <div class="row">
                    @foreach ($categories as $category)
                    <div class="col-sm-4">
                        <a href="{{ route('product_detail',['category_slug' => $category->slug ]) }}">
                            <figure class="product-category-item">
                                <div class="thumbnail">
                                    <img src="{{ asset($category->homepageUrl()) }}" alt="">
                                </div>
                                <figcaption>
                                    <h3>{{$category->title}}</h3>
                                </figcaption>
                            </figure>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<section class="boxed-sm">
    <div class="container">
        <div class="heading-wrapper text-center">
        <h3 class="heading">{{ trans('app.home.our_products') }}</h3>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="row js-product-masonry-layout-1 product-masonry-layout-1"
                    style="position: relative; height: 600px;">
                    <div class="grid-sizer"></div>
                    @foreach ($products as $product)
                        @if($loop->index == 1)
                        <figure class="item item-size-2">
                        @else
                        <figure class="item">
                        @endif
                            <div class="product product-style-2">
                                <div class="img-wrapper">
                                    <span style="cursor:pointer" onclick="openDetailModal({{ $product->id }})"
                                        data-toggle="modal" data-target="#modal-detail-product">
                                <img class="img-responsive" src="{{ asset($product->homepageUrl()) }}"
                                            alt="product thumbnail">
                                    </a>
                                    <figcaption class="desc">
                                        <h3>
                                            <span style="cursor:pointer" class="product-name"
                                            onclick="openDetailModal({{ $product->id }})" data-toggle="modal"
                                            data-target="#modal-detail-product">{{$product->product_title}}</a>
                                        </h3>
                                    </figcaption>
                                </div>
                            </div>
                        </figure>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<div class="call-to-action-style-1">
    <div class="overlay-call-to-action"></div>
    <div class="container">
        <div></div>
        <div class="row no-margin">
        <p class="home h3">{{ trans('app.home.why_choose_organic_and_clean_food') }}</p>
            @foreach ($data1 as $item)
                <div class="col-md-4 mT-10 col-sm-12 text-left text-span">
                    <h4 style="margin-left:25px;text-shadow:none">•&nbsp;&nbsp;{{$item["title"]}} </h4>
                    <p></p>
                    {!!$item["content"]!!}
                </div>
            @endforeach

        </div>
    </div>
</div>

<div class="call-to-action-style-2">
    <div class="wrapper-carousel-background">
        <img src="images/app/call-to-action/1-1.jpg" alt="">
        <img src="images/app/call-to-action/1-1.jpg" alt="">
        <img src="images/app/call-to-action/1-1.jpg" alt="">
        <img src="images/app/call-to-action/1-1.jpg" alt="">
    </div>
    <div class="overlay-call-to-action"></div>
    <a class="btn btn-brand pill icon-left" href="#">
        <i class="fa fa-facebook-square"></i>{{ trans('app.home.like_us') }}
    </a>
</div>

<div class="modal fade" id="modal-detail-product" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-quickview woocommerce" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>

@endsection

@section('extra_scripts')
    @include('user.products.scripts')
@endsection
