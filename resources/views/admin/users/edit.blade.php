@extends('layouts.admin')
@section('content')
@include('admin.shared.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
<div class="container-fluid">
    <div id="ui-view">
        <div>
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content">
                            <div class="tab-pane active" id="home" role="tabpanel">
                                {!! Form::model($user, ['method' => 'PATCH', 'url' => $isMyProfile ? 'admin/my-profile'
                                : ['/admin/users', $user->id], 'files' => true]) !!}
                                @include ('admin.users.form')
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