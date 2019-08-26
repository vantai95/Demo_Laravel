@extends('layouts.admin')
@section('content')
@include('admin.shared.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
<div class="container-fluid">
    <div id="ui-view">
        <div>
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home">@lang('admin.users.tab.my_info')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile">@lang('admin.users.tab.change_password')</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="home" role="tabpanel">
                                {!! Form::model($user, ['method' => 'PATCH', 'url' => $isMyProfile ? 'admin/my-profile'
                                : ['/admin/users', $user->id], 'files' => true]) !!}
                                @include ('admin.users.form')
                                {!! Form::close() !!}
                            </div>
                            <div class="tab-pane" id="profile" role="tabpanel">
                                {!! Form::model($user, ['method' => 'PATCH', 'url' => $isMyProfile ?
                                'admin/my-profile/change-password'
                                : ['/admin/users/change-password', $user->id], 'files' => true]) !!}
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-lg-6 {{ $errors->has('email') ? 'has-danger' : ''}}">
                                                <label for="email" class="col-sm-12 col-form-label">
                                                    @lang('admin.users.columns.email')
                                                    <span class="text-danger"> </span>
                                                </label>
                                                <div class="col-sm-12">
                                                    {!! Form::text('email', null, ['class' => 'form-control',
                                                    'aria-invalid' => 'true', 'disabled'])
                                                    !!} {!!
                                                    $errors->first('email',
                                                    '
                                                    <p class="text-danger">:message</p>') !!}
                                                </div>
                                            </div>
                                            <div class="col-lg-6 {{ $errors->has('old_password') ? 'has-danger' : ''}}">
                                                <label for="old_password" class="col-sm-12 col-form-label">
                                                    @lang('admin.users.columns.old_password')
                                                    <span class="text-danger"> *</span>
                                                </label>
                                                <div class="col-sm-12">
                                                    {!! Form::password('old_password', ['class' => 'form-control',
                                                    'aria-invalid' => 'true'])
                                                    !!} {!!
                                                    $errors->first('old_password',
                                                    '
                                                    <p class="text-danger">:message</p>') !!}
                                                </div>
                                            </div>
                                            <div class="col-lg-6 {{ $errors->has('password') ? 'has-danger' : ''}}">
                                                <label for="password" class="col-sm-12 col-form-label">
                                                    @lang('admin.users.columns.new_password')
                                                    <span class="text-danger"> *</span>
                                                </label>
                                                <div class="col-sm-12">
                                                    {!! Form::password('password', ['class' => 'form-control',
                                                    'aria-invalid' =>
                                                    'true']) !!} {!!
                                                    $errors->first('password',
                                                    '
                                                    <p class="text-danger">:message</p>') !!}
                                                </div>
                                            </div>
                                            <div
                                                class="col-lg-6 {{ $errors->has('confirm_password') ? 'has-danger' : ''}}">
                                                <label for="confirm_password" class="col-sm-12 col-form-label">
                                                    @lang('admin.users.columns.confirm_password')
                                                    <span class="text-danger"> *</span>
                                                </label>
                                                <div class="col-sm-12">
                                                    {!! Form::password('confirm_password', ['class' => 'form-control',
                                                    'aria-invalid' =>
                                                    'true']) !!} {!!
                                                    $errors->first('confirm_password',
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
                                                trans('admin.buttons.update'), ['class'
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
            </div>
        </div>
    </div>
</div>
@endsection