@extends('layouts.app', ['layout_class' => 'about', 'title' => trans('app.about_us.title')])

@section('content')
<section class="sub-header shop-layout-1">
    <img class="rellax bg-overlay" src="{{ asset($about_us_banner->imageUrl()) }}" alt="">
    <div class="overlay-call-to-action"></div>
    <h3 class="heading-style-3">{{ trans('app.about_us.title') }}</h3>
</section>

<section class="boxed-sm">
    <div class="container">
        <div class="row blog-v reverse">
            <div class="col-md-12">
                <div class="post">
                    <div class="img-wrapper js-set-bg-blog-thumb">
                        <img src="{{ $company->introductionUrl() }}" alt="blog-thumb">
                    </div>
                    <div class="desc">
                        <h3 class="title-about">{{ trans('app.about_us.about_the_company') }}</h3>
                        <p class="sapo">{{ $company->introduction }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="post">
                    <div class="img-wrapper js-set-bg-blog-thumb">
                        <img src="{{ $company->goalUrl() }}" alt="blog-thumb">
                    </div>
                    <div class="desc">
                        <h3 class="title-about">{{ trans('app.about_us.goal_long_term') }}</h3>
                        <p class="sapo">{{ $company->goal }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="counter-wrapper">
        <img class="rellax bg-overlay" src="{{ asset('images/app/call-to-action/4.jpg') }}" alt="" />
        <div class="overlay-counter"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="couter-wrapper">
                        <p class="js-countup" data-count="{{ $company->total_happy_customers }}">0</p>
                        <span>{{ trans('app.about_us.happy_client') }}</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="couter-wrapper">
                        <p class="js-countup" data-count="{{ $company->total_stores }}">0</p>
                        <span>{{ trans('app.about_us.products_in_store') }}</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="couter-wrapper">
                        <p class="js-countup" data-count="{{ $company->total_experience_years }}">0</p>
                        <span>{{ trans('app.about_us.year_of_experience') }}</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="couter-wrapper">
                        <p class="js-countup" data-count="{{ $company->total_active_projects }}">0</p>
                        <span>{{ trans('app.about_us.runing_projects') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="boxed-sm">
    <div class="container">
        <div class="heading-wrapper text-center">
            <h3 class="heading">{{ trans('app.about_us.out_team') }}</h3>
        </div>
        <div class="team-wrapper">
            <div class="row">
                <div class="about-carousel">
                    @foreach ($teams as $item)
                    <div class="item">
                        <figure class="item-team">
                            <div class="img-wrapper">
                                <img class="img-responsive" src="{{ $item->avatarUrl() }}" alt="product thumbnail">
                            </div>
                            <figcaption class="desc text-center">
                                <h4 class="name">{{ $item->full_name }}</h4>
                                <span class="position">{{ $item->title }}</span>
                            </figcaption>
                        </figure>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
