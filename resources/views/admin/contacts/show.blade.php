@extends('layouts.admin')
@section('content')
@include('admin.shared.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
<div class="container-fluid">
    <div id="ui-view">
        <div>
            <div class="animated fadeIn">
                @include ('admin.contacts.form')
            </div>
        </div>
    </div>
</div>
@endsection