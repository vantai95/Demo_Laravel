@extends('layouts.app', ['layout_class' => 'contact', 'title' => trans('app.contact_us.title')])

@section('content')
<section class="sub-header shop-layout-1">
    <img class="rellax bg-overlay" src="{{ asset($image_contact->imageUrl()) }}" alt="">
    <div class="overlay-call-to-action"></div>
    <h3 class="heading-style-3">{{ trans('app.contact_us.title') }}</h3>
</section>

<section class="boxed-sm">
    @if(!empty($contact))
    <div class="container">
        <div class="row">
            <div class="row icon-box-contact-wrapper">
                <div class="row main is-flex">
                    <div class="col-md-4">
                        <div class="icon-box">
                            <i class="fa fa-map-marker"></i>
                            <p> {{ $contact->address }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <a class="icon-box" href="tel:{{ $contact->phone }}">
                            <i class="fa fa-mobile"></i>{{ $contact->phone }}</a>
                    </div>
                    <div class="col-md-4">
                        <a class="icon-box" href="tel:{{ $contact->email }}">
                            <i class="fa fa-envelope-o"></i> {{ $contact->email }} </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="map-canvas" id="js-map-canvas">
                {!! $contact->iframe !!}
            </div>
        </div>
    </div>
    @else
    <div class="container">
        <div class="row">
            <div class="row icon-box-contact-wrapper">
                <div class="row">
                    <div class="col-md-12" style="font-size:20px;">@lang('app.contact_us.no_agent')</div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="container">
        <div class="row form-contact">
            <div class="row main">
                {!! Form::open(array('route' => 'submit_contact_us', 'class' => '')) !!}
                <div class="col-md-12">
                    <div class="form-group organic-form xs-radius">
                        {!! Form::textarea('content', null, ['class' => 'form-control',
                        'placeholder'=>trans('app.contact_us.placeholder_message')]) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group organic-form xs-radius">
                        {!! Form::text('name', null, ['class' => 'form-control',
                        'placeholder'=>trans('app.contact_us.placeholder_name')]) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group organic-form xs-radius">
                        {!! Form::text('email', null, ['class' => 'form-control',
                        'placeholder'=>trans('app.contact_us.placeholder_email')]) !!}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group organic-form xs-radius">
                        {!! Form::text('phone', null, ['class' => 'form-control',
                        'placeholder'=>trans('app.contact_us.placeholder_phone')]) !!}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group organic-form xs-radius">
                        <button class="btn btn-brand pill">{{ trans('app.contact_us.send_mail') }}</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>
@endsection
@section('extra_scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $("iframe").css({"width" : "100%", "height" : "100%"});
    });
</script>
@endsection
