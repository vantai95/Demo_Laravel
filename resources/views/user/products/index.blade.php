@extends('layouts.app', ['layout_class' => 'shop-layout-2', 'title' => trans('app.products.title')])

@section('content')
<section class="sub-header shop-layout-1">
    <img class="rellax bg-overlay" src="{{ asset($product_banner->imageUrl()) }}" alt="">
    <div class="overlay-call-to-action"></div>
    <h3 class="heading-style-3">{{ trans('app.products.title') }}</h3>
</section>

<section class="boxed-sm">
    <div class="container">
        <div class="product-list-wrapper">
            @foreach ($categories as $index => $category)
            <div class="row">
                <div class="product-category-item-5">
                    <div class="cate-thumbnail">
                        <img src="{{ asset($category->jumbotronUrl())}}" alt="category thumbnail">
                    </div>
                    <div class="outter-product-wrapper">
                        <h3 class="cate-title">{{$category->title}}</h3>
                        <div class="inner-product-wrapper">
                            @foreach ($category->products->take(3) as $product)
                            <figure class="item">
                                <div class="product product-style-1">
                                    <div class="img-wrapper">
                                        <span class="show-product-detail" data-toggle="modal"
                                            onclick="openDetailModal({{ $product->id }})" style="cursor:pointer"
                                            data-target="#modal-detail-product">
                                            <img class="img-responsive" src="{{ asset($product->imageUrl()) }}"
                                                alt="product thumbnail">
                                        </span>
                                    </div>
                                    <figcaption class="desc text-center">
                                        <h3>
                                            <span class="product-name" style="cursor:pointer" data-toggle="modal"
                                                data-target="#modal-detail-product"
                                                onclick="openDetailModal({{ $product->id }})">{{ $product->title }}</span>
                                        </h3>
                                    </figcaption>
                                </div>
                            </figure>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
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
