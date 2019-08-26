<footer class="footer-style-1">
    <div class="container">
        <div class="row">
            <div class="footer-style-1-inner">
                <div class="widget-footer widget-text col-first col-small">
                    <a href="#">
                        <img class="logo-footer" src="{{asset('/images/app/logo.png')}}" alt=""/>
                    </a>
                    <div class="widget-link">
                        <ul>
                            <li style="display:flex">
                                <span class="lnr lnr-map-marker icon" style="line-height:24px"></span>
                                <span>{{ trans('app.company.address') }}</span>
                            </li>
                            <li style="display:flex; align-items: center;">
                                <span class="lnr lnr-phone-handset icon"></span>
                                <a href="tel:{{ trans('app.company.phone') }}">{{ trans('app.company.phone') }}</a>
                            </li>
                            <li style="display:flex; align-items: center;">
                                <span class="lnr lnr-envelope icon"></span>
                                <a href="mailto:{{ trans('app.company.email') }}">{{ trans('app.company.email') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="widget-footer widget-link col-second col-medium">
                    <div class="list-link">
                        <h4 class="h4 heading">{{ trans('app.footer.product') }}</h4>
                        <ul>
                            @foreach(\App\Models\Category::getCategoryForMenu() as $category)
                                <li>
                                    <a href="{{ route('product_detail',['category_slug' => $category->slug ]) }}">{{ $category->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="list-link">
                        <h4 class="h4 heading">{{ trans('app.footer.support') }}</h4>
                        <ul>
                            <li>
                                <a href="{{ route('about_us') }}">{{ trans('app.about_us.title') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('where_to_buy') }}">{{ trans('app.where_to_buy.title') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('contact_us') }}">{{ trans('app.contact_us.title') }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="list-link">
                        <h4 class="h4 heading">{{ trans('app.footer.my_account') }}</h4>
                        <ul>
                            <li>
                                <a href="/login">{{ trans('app.sign_in.title') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="widget-footer widget-newsletter-footer col-last col-small">
                    <h4 class="h4 heading">{{ trans('app.footer.newsletter') }}</h4>
                    <p>{{ trans('app.newsletter.title') }}</p>
                    <form class="organic-form form-inline btn-add-on circle border">
                        <div class="form-group">
                            <input class="form-control pill transparent" placeholder="{{ trans('app.newsletter.placeholder') }}" type="email"/>
                            <button class="btn btn-brand circle" type="submit">
                                <i class="fa fa-envelope-o"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right style-1">
        <div class="container">
            <div class="row">
                <div class="copy-right-inner">
                    <p>{{ date('Y') }} © Copyright <a href="{{ route('home') }}">{{ config('app.name', 'P.M Quỳnh Lâm') }}</a>. All rights reserved.</p>
                    <div class="widget widget-footer widget-footer-creadit-card">
                        <ul class="list-unstyle">
                            <li>
                                <a href="#">
                                    <img src="{{asset('/images/app/icons/credit-card-01.png')}}" alt=""/>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{asset('/images/app/icons/credit-card-02.png')}}" alt=""/>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{asset('/images/app/icons/credit-card-03.png')}}" alt=""/>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{asset('/images/app/icons/credit-card-04.png')}}" alt=""/>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
