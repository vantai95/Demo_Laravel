<nav id="menu">
    <ul>
        <li>
            <a href="{{ route('about_us') }}">{{ trans('app.about_us.title') }}</a>
        </li>
        <li>
            <a href="{{ route('products') }}">{{ trans('app.products.title') }}</a>
            <ul>
                @foreach(\App\Models\Category::getCategoryForMenu() as $category)
                    <li>
                        <a href="{{ route('product_detail',['category_slug' => $category->slug ]) }}">{{ $category->title }}</a>
                    </li>
                @endforeach
            </ul>
        </li>
        <li>
            <a href="{{ route('where_to_buy') }}">{{ trans('app.where_to_buy.title') }}</a>
        </li>
        <li>
            <a href="{{ route('contact_us') }}">{{ trans('app.contact_us.title') }}</a>
        </li>
    </ul>
</nav>
<header class="header-style-1 {{ Route::currentRouteName() == 'home' ? '' : 'static' }}">
    <div class="container">
        <div class="row">
            <div class="header-1-inner">
                <a class="brand-logo animsition-link" href="{{ route('home') }}">
                    <img class="img-responsive" src="{{asset('/images/app/logo.png')}}" alt="" />
                </a>
                <nav>
                    <ul class="menu hidden-xs">
                        <li>
                            <a href="{{ route('about_us') }}">{{ trans('app.about_us.title') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('products') }}">{{ trans('app.products.title') }}</a>
                            <ul>
                                @foreach(\App\Models\Category::getCategoryForMenu() as $category)
                                    <li>
                                        <a href="{{ route('product_detail',['category_slug' => $category->slug ]) }}">{{ $category->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('where_to_buy') }}">{{ trans('app.where_to_buy.title') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('contact_us') }}">{{ trans('app.contact_us.title') }}</a>
                        </li>
                    </ul>
                </nav>
                <aside class="right">
                    <div class="widget widget-control-header">
                        <a href="{{ route('locale', ['locale' => 'en']) }}"><img class="img-flag" src="{{asset('/images/app/flags/en.svg')}}"></a>
                        <a href="{{ route('locale', ['locale' => 'vi']) }}"><img class="img-flag" src="{{asset('/images/app/flags/vi.svg')}}"></a>
                    </div>
                    <div class="widget widget-control-header hidden-lg hidden-md hidden-sm">
                        <a class="navbar-toggle js-offcanvas-has-events" type="button" href="#menu">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</header>
