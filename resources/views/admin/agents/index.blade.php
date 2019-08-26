@extends('layouts.admin')
@section('content')
@include('admin.shared.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        {!! Form::open(['method' => 'GET', 'url' => '/admin/agents', 'role' => 'search']) !!}
                        <div class="row justify-content-between">
                            <div class="col-lg-4 ">
                                <a href="{{ url('/admin/agents/create') }}"
                                    class="btn btn-success">@lang('admin.agents.buttons.add')</a>
                            </div>

                            <div class="col-lg-4">
                                <div class="input-group">
                                    <input class="form-control" name="q" value="{{ Request::get('q') }}" type="text"
                                    placeholder="@lang('admin.agents.search.place_holder_text')">
                                    <button class="btn btn-secondary" type="submit">
                                        @lang('admin.agents.buttons.search') <i class="fa fa-search"></i>
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
                                    <th class="align-middle">
                                        @lang('admin.agents.columns.address_en')
                                    </th>
                                    <th class="align-middle">
                                        @lang('admin.agents.columns.address_vi')
                                    </th>
                                    <th class="align-middle">
                                        @lang('admin.agents.columns.phone')
                                    </th>
                                    <th class="align-middle">
                                        @lang('admin.agents.columns.email')
                                    </th>
                                    <th class="align-middle">
                                        @lang('admin.agents.columns.is_contact')
                                    </th>
                                    <th class="align-middle">
                                        @lang('admin.agents.columns.action')
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($agents as $item)
                                <tr>
                                    <td class="align-middle">{{$item->address_en}}</td>
                                    <td class="align-middle">{{$item->address_vi}}</td>
                                    <td class="align-middle text-nowrap">{{$item->phone}}</td>
                                    <td class="align-middle text-nowrap">{{$item->email}}</td>
                                    <td class="align-middle text-center">
                                        <input type="checkbox" {{$item->is_contact ? 'checked' : ''}}  disabled/>
                                    </td>
                                    <td class="col-action">
                                        <a class="btn btn-sm btn-secondary"
                                            href="{{ url('/admin/agents/'. $item->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        {!! Form::open([ 'method' =>
                                        'GET', 'url' => ['/admin/agents/getContact', $item->id], 'style' =>
                                        'display:inline'
                                        ]) !!}
                                        <a class="btn btn-sm btn-info" onclick="confirmChangeContact(event, this)"
                                            href="javascript:void(0);">
                                            <i class="fa fa-address-card"></i>
                                            {!! Form::close() !!}
                                        </a>
                                        <a class="btn btn-sm btn-info"
                                            href="{{ url('/admin/agents/' . $item->id . '/edit') }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        {!! Form::open([ 'method' =>
                                        'DELETE', 'url' => ['/admin/agents', $item->id], 'style' =>
                                        'display:inline'
                                        ]) !!}
                                        <a class="btn btn-sm btn-danger" href="javascript:void(0);"
                                            onclick="confirmDelete(event, this)">
                                            <i class="fa fa-trash-o"></i>
                                            {!! Form::close() !!}
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @if($agents->count() == 0)
                                <tr>
                                    <td colspan="100%" class="text-center align-middle">
                                        <i>
                                            <h6 style="margin: 0px">@lang('admin.agents.not_found')</h6>
                                        </i>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="m-datatable m-datatable--default m-datatable--brand m-datatable--loaded"
                            style="margin-top: 1rem">
                            <div class="m-datatable__pager m-datatable--paging-loaded clearfix">
                                {!! $agents->appends(['q' => Request::get('q')])->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
