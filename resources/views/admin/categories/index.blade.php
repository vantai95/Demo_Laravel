@extends('layouts.admin')
@section('content')
@include('admin.shared.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        {!! Form::open(['method' => 'GET', 'url' => '/admin/categories', 'role' => 'search']) !!}
                        <div class="row justify-content-between">
                            <div class="col-lg-4">
                                <a href="{{ url('/admin/categories/create') }}"
                                    class="btn btn-success">@lang('admin.categories.buttons.add')</a>
                            </div>
                            <div class="col-lg-4">
                                <div class="input-group">
                                    <input class="form-control" name="q" value="{{ Request::get('q') }}" type="text"
                                        placeholder="@lang('admin.categories.search.place_holder_text')">
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
                                <tr></tr>
                                <th>@lang('admin.categories.columns.homepage_image')</th>
                                <th>@lang('admin.categories.columns.jumbotron_image')</th>
                                <th>@lang('admin.categories.columns.banner_image')</th>
                                <th>@lang('admin.categories.columns.english_title')</th>
                                <th>@lang('admin.categories.columns.vietnamese_title')</th>
                                <th>@lang('admin.categories.columns.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <td class="align-middle">
                                        <img src="{{ $category->homepageUrl() }}" class="img-circle"
                                            style="border: 1px solid #ddd;width:40px; height:40px ">
                                    </td>
                                    <td class="align-middle">
                                        <img src="{{ $category->jumbotronUrl() }}" class="img-circle"
                                            style="border: 1px solid #ddd;width:40px; height:40px ">
                                    </td>
                                    <td class="align-middle">
                                        <img src="{{ $category->bannerUrl() }}" class="img-circle"
                                            style="border: 1px solid #ddd;width:40px; height:40px ">
                                    </td>
                                    <td class="align-middle">{{$category->title_en}}</td>
                                    <td class="align-middle">{{$category->title_vi}}</td>
                                    <td class="align-middle">
                                        <a class="btn btn-sm btn-info"
                                            href="{{ url('/admin/categories/' . $category->id. '/edit') }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        {!! Form::open([ 'method' =>
                                        'DELETE', 'url' => ['/admin/categories', $category->id], 'style' =>
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

                                @if($categories->count() == 0)
                                <tr>
                                    <td colspan="100%" class="text-center align-middle">
                                        <i>
                                            <h6 style="margin: 0px">@lang('admin.categories.not_found')</h6>
                                        </i>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="m-datatable m-datatable--default m-datatable--brand m-datatable--loaded"
                            style="margin-top: 1rem">
                            <div class="m-datatable__pager m-datatable--paging-loaded clearfix">
                                {!! $categories->appends(['q' => Request::get('q')])->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
