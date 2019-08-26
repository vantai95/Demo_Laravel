@extends('layouts.admin')
@section('content')
@include('admin.shared.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12">
                {!! Form::open(['url' => '/admin/users',
                'files' => true, 'id'
                =>'submitForm']) !!}
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-lg-6 {{ $errors->has('name') ? 'has-danger' : ''}}">
                                <label for="name" class="col-sm-12 col-form-label">
                                    @lang('admin.users.form.name')
                                    <span class="text-danger"> *</span>
                                </label>
                                <div class="col-sm-12">
                                    {!! Form::text('name', null, ['class' => 'form-control', 'aria-invalid' => 'true'])
                                    !!} {!!
                                    $errors->first('name',
                                    '
                                    <p class="text-danger">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6 {{ $errors->has('email') ? 'has-danger' : ''}}">
                                <label for="email" class="col-sm-12 col-form-label">
                                    @lang('admin.users.form.email')
                                    <span class="text-danger"> *</span>
                                </label>
                                <div class="col-sm-12">
                                    {!! Form::text('email', null, ['class' => 'form-control', 'aria-invalid' => 'true'])
                                    !!} {!!
                                    $errors->first('email',
                                    '
                                    <p class="text-danger">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6 {{ $errors->has('password') ? 'has-danger' : ''}}">
                                <label for="password" class="col-sm-12 col-form-label">
                                    @lang('admin.users.form.password')
                                    <span class="text-danger"> *</span>
                                </label>
                                <div class="col-sm-12">
                                    {!! Form::password('password', ['class' => 'form-control', 'aria-invalid' =>
                                    'true']) !!} {!!
                                    $errors->first('password',
                                    '
                                    <p class="text-danger">:message</p>') !!}
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
                                <a href="{{url('admin')}}" class="btn btn-outline-secondary">
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
@endsection