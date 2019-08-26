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
                                <a class="nav-link {{ $activeTeamTab ? '' : 'active'}}" data-toggle="tab" href="#about_us" role="tab"
                                    aria-controls="about_us">@lang('admin.companies.tab.about_us')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $activeTeamTab ? 'active' : ''}}" data-toggle="tab" href="#team" role="tab"
                                    aria-controls="team">@lang('admin.companies.tab.team')</a>
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
                                                {!! Form::model($team ,['method' => 'post', 'url' => ['/admin/companies/editTeam', $team->id], 'files' => true,
                                                'id' => 'submitTeamForm']) !!}
                                                @include ('admin.companies.team_form')
                                                {!! Form::close() !!}
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

    var DropzoneDemo = new Dropzone(".m-dropzone-team", {
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
                    file.name = "{{$team->avatar_image}}";
                    this.files.push(file);
                    // Emulate configuration to create interface
                    this.emit("addedfile", file);
                    // Add thumbnail url
                    this.emit("thumbnail", file,'{{url('images/admin/team/'.$team->avatar_image)}}');
                    // Add status processing to file
                    this.emit("processing", file);
                    // Add status success to file AND RUN CONFIGURATION success from responce
                    this.emit("success", file, responce, false);
                    // Add status complete to file
                    this.emit("complete", file);
                }
                this.addCustomFile({status: "success"});
        }
    });

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
        });

        $("#submitTeamButton").click(function () {
            $('.m-dropzone-team').find('img').each(function () {
                $('#submitTeamForm').append('<input type="hidden" name="avatar_image" value="' + $(this).attr('src') + '" />');
            });
            $('#submitTeamForm').submit();
        });
    });



</script>
@endsection
