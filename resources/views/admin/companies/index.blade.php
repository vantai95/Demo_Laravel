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
                                <a class="nav-link {{ $activeTeamTab ? '' : 'active'}}" data-toggle="tab"
                                    href="#about_us" role="tab"
                                    aria-controls="about_us">@lang('admin.companies.tab.about_us')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $activeTeamTab ? 'active' : ''}}" data-toggle="tab" href="#team"
                                    role="tab" aria-controls="team">@lang('admin.companies.tab.team')</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane {{ $activeTeamTab ? '' : 'active'}}" id="about_us" role="tabpanel">
                                {!! Form::open(['method' => 'post', 'url' => 'admin/companies', 'files' => true, 'id' =>
                                'submitForm']) !!}
                                @include ('admin.companies.about_us_form')
                                {!! Form::close() !!}
                            </div>
                            <div class="tab-pane {{ $activeTeamTab ? 'active' : ''}}" id="team" role="tabpanel">
                                <div class="container-fluid">
                                    <div class="animated fadeIn">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        {!! Form::open(['method' => 'GET', 'url' => '/admin/companies',
                                                        'role' => 'search']) !!}
                                                        <div class="row justify-content-between">
                                                            <div class="col-lg-2">
                                                                <a href="{{ url('/admin/companies/createTeam') }}"
                                                                    class="btn btn-success">@lang('admin.companies.team.buttons.add')</a>
                                                            </div>

                                                            <div class="col-lg-4">
                                                                <div class="input-group">
                                                                    <input class="form-control" name="q"
                                                                        value="{{ Request::get('q') }}" type="text"
                                                                        placeholder="@lang('admin.companies.team.search.place_holder_text')">
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
                                                                    <th>@lang('admin.companies.team.columns.avatar_image')
                                                                    </th>
                                                                    <th>@lang('admin.companies.team.columns.fullname')
                                                                    </th>
                                                                    <th>@lang('admin.companies.team.columns.title')</th>

                                                                    <th>@lang('admin.companies.team.columns.action')
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($teams as $team)
                                                                <tr>
                                                                    <td class="align-middle">
                                                                        <img src="{{ $team->avatarUrl() }}"
                                                                            class="img-circle"
                                                                            style="border: 1px solid #ddd;width:40px; height:40px ">
                                                                    </td>
                                                                    <td class="align-middle">{{$team->full_name}}
                                                                    </td>
                                                                    <td class="align-middle">{{$team->title}}
                                                                    </td>
                                                                    <td class="align-middle">
                                                                        <a class="btn btn-sm btn-info"
                                                                            href="{{ url('/admin/companies/' . $team->id. '/editTeam') }}">
                                                                            <i class="fa fa-edit"></i>
                                                                        </a>
                                                                        {!! Form::open([ 'method' =>
                                                                        'POST', 'url' =>
                                                                        ['/admin/companies/destroyTeam',
                                                                        $team->id], 'style' =>
                                                                        'display:inline'
                                                                        ]) !!}
                                                                        <a class="btn btn-sm btn-danger"
                                                                            href="javascript:void(0);"
                                                                            onclick="confirmDelete(event, this)">
                                                                            <i class="fa fa-trash-o"></i>
                                                                            {!! Form::close() !!}
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                @endforeach

                                                                @if($teams->count() == 0)
                                                                <tr>
                                                                    <td colspan="100%" class="text-center align-middle">
                                                                        <i>
                                                                            <h6 style="margin: 0px">
                                                                                @lang('admin.companies.team.not_found')
                                                                            </h6>
                                                                        </i>
                                                                    </td>
                                                                </tr>
                                                                @endif
                                                            </tbody>
                                                        </table>
                                                        <div class="m-datatable m-datatable--default m-datatable--brand m-datatable--loaded"
                                                            style="margin-top: 1rem">
                                                            <div
                                                                class="m-datatable__pager m-datatable--paging-loaded clearfix">
                                                                {!! $teams->appends(['q' =>
                                                                Request::get('q')])->render() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra_scripts')
<script>
    var token = $('input[name="_token"]').val();

        $('.m-dropzone-about').each(function( index ) {
            let img = $(this).parent().attr('id');

            let id = $(this).attr('id');

            Dropzone.autoDiscover = false;

            var myDropzone = new Dropzone(".m-dropzone_"+id, {
                // autoDiscover : false,
                paramName: "file",
                // autoProcessQueue: true,
                maxFiles: 1,
                acceptedFiles: "image/*",
                maxFilesize: 10,
                addRemoveLinks: true,
                thumbnailWidth: null,
                thumbnailHeight: null,
                removedfile: function(file){
                    file.previewElement.remove();
                    return true;
                },
                accept: function (e, o) {
                    "image.jpg" == e.name ? o("No, you don't.") : o()
                },
                'url': "{{ url('/admin/companies/upload') }}",
                "headers":
                    {
                        'X-CSRF-TOKEN': token
                    },

                init: function () {
                    let instance = this;
                    instance.on('addedfile', function (file) {
                        if (this.files[1] != null) {
                            this.removeFile(this.files[0]);
                        }
                    });
                    this.addCustomFile = function (file, thumbnail_url, responce) {
                        // Push file to collection
                        file.name = img;
                        this.files.push(file);
                        // Emulate configuration to create interface
                        this.emit("addedfile", file);
                        // Add thumbnail url
                        this.emit("thumbnail", file,'{{url('/images/admin/company')}}' +'/'+ img);
                        // Add status processing to file
                        this.emit("processing", file);
                        // Add status success to file AND RUN CONFIGURATION success from responce
                        this.emit("success", file, responce, false);
                        // Add status complete to file
                        this.emit("complete", file);
                    }
                    if(img != ''){
                        this.addCustomFile(
                            // Thumbnail url
                            //"http://localhost:8000/images/configurations/1536742929.0.png",
                            // Custom responce for configuration success
                            {
                                status: "success"
                            }
                        );
                    }
                }
            });
        });
        $(document).ready(function () {
            $("#submitButton").click(function () {
                $('.configurations').remove();
                $('.m-dropzone-about').each(function (index) {
                    let id = $(this).attr('id');
                    let count = $(this).find('img').length;
                    if(count == 0){
                        $('#submitForm').append('<input type="hidden" name="'+ id + '" value=" " /> ');
                    }else{
                        $(this).find('img').each(function (index) {
                            $('#submitForm').append('<input type="hidden" name="'+ id + '" value="' + $(this).attr('src') + '" /> ');
                        })
                    }
                });
            })
        });
</script>
@endsection
