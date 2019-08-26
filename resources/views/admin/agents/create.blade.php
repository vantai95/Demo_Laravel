@extends('layouts.admin')
@section('content')
@include('admin.shared.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
<div class="container-fluid">
    <div id="ui-view">
        <div>
            <div class="animated fadeIn">
                {!! Form::open(['url' => '/admin/agents', 'class' => 'form-horizontal', 'files' => true, 'id'
                =>'submitForm']) !!}
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            
                            <div class="col-lg-6 {{ $errors->has('name_en') ? 'has-danger' : ''}}">
                                <label for="name_en" class="col-sm-12 col-form-label">
                                    @lang('admin.agents.form.name_en')
                                    <span class="text-danger"> *</span>
                                </label>
                                <div class="col-sm-12">
                                    {!! Form::text('name_en', null, ['class' => 'form-control','rows' =>
                                    5,'aria-invalid' => 'true'
                                    ]) !!}
                                </div>
                            </div>
                            <div class="col-lg-6 {{ $errors->has('name_vi') ? 'has-danger' : ''}}">
                                <label for="name_vi" class="col-sm-12 col-form-label">
                                    @lang('admin.agents.form.name_vi')
                                    <span class="text-danger"> *</span>
                                </label>
                                <div class="col-sm-12">
                                    {!! Form::text('name_vi', null, ['class' => 'form-control','rows' =>
                                    5,'aria-invalid' => 'true'
                                    ]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 {{ $errors->has('address_en') ? 'has-danger' : ''}}">
                                <label for="address_en" class="col-sm-12 col-form-label">
                                    @lang('admin.agents.form.address_en')
                                    <span class="text-danger"> *</span>
                                </label>
                                <div class="col-sm-12">
                                    {!! Form::textarea('address_en', null, ['class' => 'form-control','rows' =>
                                    5,'aria-invalid' => 'true'
                                    ]) !!}
                                </div>
                            </div>
                            <div class="col-lg-6 {{ $errors->has('address_vi') ? 'has-danger' : ''}}">
                                <label for="email" class="col-sm-12 col-form-label">
                                    @lang('admin.agents.form.address_vi')
                                    <span class="text-danger"> *</span>
                                </label>
                                <div class="col-sm-12">
                                    {!! Form::textarea('address_vi', null, ['class' => 'form-control','rows' =>
                                    5,'aria-invalid' => 'true'
                                    ]) !!}
                                </div>
                            </div>
                            <div class="col-lg-6 {{ $errors->has('email') ? 'has-danger' : ''}}">
                                <label for="content" class="col-sm-12 col-form-label">
                                    @lang('admin.agents.form.email')
                                    <span class="text-danger"> *</span>
                                </label>
                                <div class="col-sm-12">
                                    {!! Form::text('email', null, ['class' => 'form-control', 'aria-invalid' =>
                                    'true'
                                    ]) !!}
                                </div>
                            </div>
                            <div class="col-lg-6 {{ $errors->has('phone') ? 'has-danger' : ''}}">
                                <label for="phone" class="col-sm-12 col-form-label">
                                    @lang('admin.agents.form.phone')
                                    <span class="text-danger"> *</span>
                                </label>
                                <div class="col-sm-12">
                                    {!! Form::text('phone', null, ['class' => 'form-control', 'aria-invalid' => 'true'
                                    ]) !!}
                                </div>
                            </div>
                            <div class="col-lg-12 {{ $errors->has('iframe') ? 'has-danger' : ''}}">
                                <label for="iframe" class="col-sm-12 col-form-label">
                                    @lang('admin.agents.form.google_maps')
                                    <span class="text-danger"> *</span>
                                </label>
                                <div class="col-sm-12">
                                    {!! Form::textarea('iframe', null, ['class' => 'form-control b','rows' =>
                                    5,'id' => 'iframe', 'aria-invalid' =>
                                    'true'
                                    ]) !!}
                                    <a class="btn btn-sm btn-info float-right" style="margin-top: 10px"
                                        onclick="getIframe()">
                                        <i class="fa fa-map"></i> @lang('admin.agents.form.preview')
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                {!! Form::submit(isset($submitButtonText) ? $submitButtonText :
                                trans('admin.buttons.create'), ['class'
                                => 'btn btn-outline-primary',
                                'id' => 'submitButton']) !!}
                                <a href="{{url('admin/agents')}}" class="btn btn-outline-secondary">
                                    @lang('admin.buttons.cancel')
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="quick-view-product" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-quickview woocommerce" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="google-maps" id="div-that-holds-the-iframe"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
