@extends('layouts.admin')
@section('content')
@include('admin.shared.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        {!! Form::open(['method' => 'GET', 'url' => '/admin/products', 'role' => 'search']) !!}
                        <div class="row justify-content-between">
                            <div class="col-lg-4 ">
                                <a href="{{ url('/admin/products/create?category_id='.$categoryId) }}"
                                    class="btn btn-success">@lang('admin.products.buttons.add')</a>
                            </div>

                            <div class="col-lg-4">
                                <div style="display:table">
                                    <div class="align-middle" style="display:table-cell; padding-right: 0.5rem">
                                        <label style="white-space: nowrap; margin:0px" for="category" class="control-label">@lang('admin.products.form.category'):</label></div>
                                    <div class="align-middle" style="display:table-cell; width:100%">
                                        <select class="form-control" name="category_id" id="m_form_type" onchange="this.form.submit()">
                                            <option value="" {{ ($categories == "" ? 'selected' : '') }}>
                                                @lang('admin.products.categories.all')
                                            </option>
                                            @foreach($categories as $key => $value)
                                                <option value="{{$key}}" {{ ($categoryId == $key? 'selected' : '') }}>
                                                    {{$value}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="input-group">
                                    <input class="form-control" name="q" value="{{ Request::get('q') }}" type="text"
                                    placeholder="@lang('admin.products.search.place_holder_text')">
                                    <button class="btn btn-secondary" type="submit">
                                        @lang('admin.agents.buttons.search') <i
                                            class="fa fa-search"></i>
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
                                <th>@lang('admin.products.columns.homepage_image')</th>
                                <th>@lang('admin.products.columns.image')</th>
                                <th>@lang('admin.products.columns.english_title')</th>
                                <th>@lang('admin.products.columns.vietnamese_title')</th>
                                <th>@lang('admin.products.columns.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td class="align-middle">
                                        <img src="{{ $product->homepageUrl() }}" class="img-circle"
                                            style="border: 1px solid #ddd;width:40px; height:40px ">
                                    </td>
                                    <td class="align-middle">
                                        <img src="{{ $product->imageUrl() }}" class="img-circle" style="border: 1px solid #ddd;width:40px; height:40px ">
                                    </td>
                                    <td class="align-middle">{{$product->title_en}}</td>
                                    <td class="align-middle">{{$product->title_vi}}</td>
                                    <td class="align-middle">
                                        <a class="btn btn-sm btn-info"
                                            href="{{ url('/admin/products/' . $product->id. '/edit') }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        {!! Form::open([ 'method' =>
                                        'DELETE', 'url' => ['/admin/products', $product->id], 'style' =>
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

                                @if($products->count() == 0)
                                <tr>
                                    <td colspan="100%" class="text-center align-middle">
                                        <i>
                                            <h6 style="margin: 0px">@lang('admin.products.not_found')</h6>
                                        </i>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="m-datatable m-datatable--default m-datatable--brand m-datatable--loaded"
                            style="margin-top: 1rem">
                            <div class="m-datatable__pager m-datatable--paging-loaded clearfix">
                                {!! $products->appends(['q' => Request::get('q')])->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
