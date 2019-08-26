@extends('layouts.admin')
@section('content')
@include('admin.shared.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        {!! Form::open(['method' => 'GET', 'url' => '/admin/contacts', 'role' => 'search']) !!}
                        <div class="row justify-content-end">
                            <div class="col-lg-4">
                                <div class="input-group">
                                    <input class="form-control" name="q" value="{{ Request::get('q') }}" type="text"
                                    placeholder="@lang('admin.contacts.search.place_holder_text')">
                                    <button class="btn btn-secondary" type="submit">
                                        @lang('admin.contacts.buttons.search') <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                            <thead>
                                <tr>
                                    <th>@lang('admin.contacts.columns.name')</th>
                                    <th>@lang('admin.contacts.columns.email')</th>
                                    <th>@lang('admin.contacts.columns.phone')</th>
                                    <th>@lang('admin.contacts.columns.created_at')</th>
                                    <th>@lang('admin.contacts.columns.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-secondary"
                                            href="{{ url('/admin/contacts/' . $item->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        {!! Form::open([ 'method' =>
                                        'DELETE', 'url' => ['/admin/contacts', $item->id], 'style' => 'display:inline'
                                        ]) !!}
                                        <a class="btn btn-sm btn-danger" href="javascript:void(0);"
                                            onclick="confirmDelete(event, this)">
                                            <i class="fa fa-trash-o"></i>
                                            {!! Form::close() !!}
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @if($contacts->count() == 0)
                                <tr>
                                    <td colspan="100%" class="text-center align-middle">
                                        <i>
                                            <h6 style="margin: 0px">@lang('admin.contacts.not_found')</h6>
                                        </i>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="m-datatable m-datatable--default m-datatable--brand m-datatable--loaded"
                            style="margin-top: 1rem">
                            <div class="m-datatable__pager m-datatable--paging-loaded clearfix">
                                {!! $contacts->appends(['q' => Request::get('q')])->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
