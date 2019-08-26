<div class="row">
    <div class="col-md-6">
        <div class="woocommerce-product-gallery">
            <div class="main-carousel-product-quick-view">
                @foreach ($images as $image)
                    <div class="item">
                        <img class="img-responsive" src="{{ asset('/images/admin/product/'.$image) }}" alt="product thumbnail" />
                    </div>
                @endforeach
            </div>
            <div class="thumbnail-carousel-product-quickview">
                @foreach ($images as $image)
                    <div class="item">
                        <img class="img-responsive" src="{{ asset('/images/admin/product/'.$image) }}" alt="product thumbnail" />
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="summary">
            <div class="desc">
                <div class="header-desc">
                <h2 class="product-title">{{ $product->product_title }}</h2>
                </div>
                <div class="body-desc">
                    <div class="woocommerce-product-details-short-description">
                    <p class="product-content">{!! $product->product_content !!}</p>
                    </div>
                </div>
            </div>
            <div class="product-meta">
                <p class="posted-in">@lang('app.products.categories'):
                    <a href="{{ route('product_detail',['category_slug' => $product->category_slug ]) }}" rel="tag" class="category-title">{{ $product->category_title }}</a>
                </p>
            </div>
        </div>
    </div>
</div>
