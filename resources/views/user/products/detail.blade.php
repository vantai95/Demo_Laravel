@extends('layouts.app', ['layout_class' => 'shop-layout-1 woocommerce', 'title' => trans('app.meats.title')])

@section('content')
<section class="sub-header shop-layout-1">
    <img class="rellax bg-overlay" src="{{ asset($category->bannerUrl()) }}" alt="">
    <div class="overlay-call-to-action"></div>
    <h3 class="heading-style-3">{{ $category->title }}</h3>
</section>

<section class="box-sm">
    <div class="container">
        <div class="row main">
            <div class="row product-grid-equal-height-wrapper product-equal-height-4-columns flex multi-row">
                @foreach ($products as $product)
                <figure class="item">
                    <div class="product product-style-1">
                        <div class="img-wrapper">
                            <span style="cursor:pointer" onclick="openDetailModal({{ $product->id }})"
                                data-toggle="modal" data-target="#modal-detail-product">
                                <img class="img-responsive" src="{{ asset($product->imageUrl()) }}"
                                    alt="product thumbnail">
                            </span>
                        </div>
                        <figcaption class="desc text-center">
                            <h3>
                                <span style="cursor:pointer" class="product-name"
                                    onclick="openDetailModal({{ $product->id }})" data-toggle="modal"
                                    data-target="#modal-detail-product">{{$product->product_title}}</a>
                            </h3>
                        </figcaption>
                    </div>
                </figure>
                @endforeach
            </div>
        </div>
    </div>
</section>

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
