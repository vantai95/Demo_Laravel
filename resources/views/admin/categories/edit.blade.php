@extends('layouts.admin')
@section('content')
@include('admin.shared.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12">
                {!! Form::model($category ,['method' => 'PATCH', 'url' => ['/admin/categories', $category->id], 'files' => true,
                'id' => 'submitForm']) !!}
                @include ('admin.categories.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection


@section('extra_scripts')
<script>
    var token = $('input[name="_token"]').val();
    var DropzoneDemo = {
        init: function () {
            Dropzone.options.mDropzoneTwo = {
                paramName: "file",
                maxFiles: 1,
                acceptedFiles: "image/*",
                init: function () {
                    this.on("maxfilesexceeded", function (file) {
                        this.removeAllFiles();
                        this.addFile(file);
                    });
                },
                maxFilesize: 10,
                addRemoveLinks: !0,
                thumbnailWidth: null,
                thumbnailHeight: null,
                accept: function (e, o) {
                    "image.jpg" == e.name ? o("No, you don't.") : o()
                },
                'url': "{{ url('admin/categories/upload') }}",
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
                    @if(!empty($category->jumbotron_image))
                        this.addCustomFile = function (file, thumbnail_url, response) {
                        // Push file to collection
                        file.name = "{{$category->jumbotron_image}}";
                        this.files.push(file);
                        // Emulate event to create interface
                        this.emit("addedfile", file);
                        // Add thumbnail url
                        this.emit("thumbnail", file, '{{url('images/admin/category/'.$category->jumbotron_image)}}');
                        // Add status processing to file
                        this.emit("processing", file);
                        // Add status success to file AND RUN EVENT success from response
                        this.emit("success", file, response, false);
                        // Add status complete to file
                        this.emit("complete", file);
                    };
                    this.addCustomFile({status: "success"});
                    @endif
                }
            }
        }
    };

    var DropzoneDemo2 = {
        init: function () {
            Dropzone.options.mDropzoneThree = {
                paramName: "file",
                maxFiles: 1,
                init: function () {
                    this.on("maxfilesexceeded", function (file) {
                        this.removeAllFiles();
                        this.addFile(file);
                    });
                },
                maxFilesize: 10,
                addRemoveLinks: !0,
                thumbnailWidth: null,
                thumbnailHeight: null,
                accept: function (e, o) {
                    "image.jpg" == e.name ? o("No, you don't.") : o()
                },
                'url': "{{ url('admin/categories/upload') }}",
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
                    @if(!empty($category->jumbotron_image))
                        this.addCustomFile = function (file, thumbnail_url, response) {
                        // Push file to collection
                        file.name = "{{$category->banner_image}}";
                        this.files.push(file);
                        // Emulate event to create interface
                        this.emit("addedfile", file);
                        // Add thumbnail url
                        this.emit("thumbnail", file, '{{url('images/admin/category/'.$category->banner_image)}}');
                        // Add status processing to file
                        this.emit("processing", file);
                        // Add status success to file AND RUN EVENT success from response
                        this.emit("success", file, response, false);
                        // Add status complete to file
                        this.emit("complete", file);
                    };
                    this.addCustomFile({status: "success"});
                    @endif
                }
            }
        }
    };

    var DropzoneDemo3 = {
        init: function () {
            Dropzone.options.mDropzoneOne = {
                paramName: "file",
                maxFiles: 1,
                init: function () {
                    this.on("maxfilesexceeded", function (file) {
                        this.removeAllFiles();
                        this.addFile(file);
                    });
                },
                maxFilesize: 10,
                addRemoveLinks: !0,
                thumbnailWidth: null,
                thumbnailHeight: null,
                accept: function (e, o) {
                    "image.jpg" == e.name ? o("No, you don't.") : o()
                },
                'url': "{{ url('admin/categories/upload') }}",
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
                    @if(!empty($category->homepage_image))
                        this.addCustomFile = function (file, thumbnail_url, response) {
                        // Push file to collection
                        file.name = "{{$category->homepage_image}}";
                        this.files.push(file);
                        // Emulate event to create interface
                        this.emit("addedfile", file);
                        // Add thumbnail url
                        this.emit("thumbnail", file, '{{url('images/admin/category/'.$category->homepage_image)}}');
                        // Add status processing to file
                        this.emit("processing", file);
                        // Add status success to file AND RUN EVENT success from response
                        this.emit("success", file, response, false);
                        // Add status complete to file
                        this.emit("complete", file);
                    };
                    this.addCustomFile({status: "success"});
                    @endif
                }
            }
        }
    };

    DropzoneDemo.init();
    DropzoneDemo2.init();
    DropzoneDemo3.init();
    $(document).ready(function () {
        $("#submitButton").click(function () {
            $('#m-dropzone-one').find('img').each(function () {
                $('#submitForm').append('<input type="hidden" name="homepage_image" value="' + $(this).attr('src') + '" />');
            });
            $('#m-dropzone-two').find('img').each(function () {
                $('#submitForm').append('<input type="hidden" name="jumbotron_image" value="' + $(this).attr('src') + '" />');
            });
            $('#m-dropzone-three').find('img').each(function () {
                $('#submitForm').append('<input type="hidden" name="banner_image" value="' + $(this).attr('src') + '" />');
            });
            $('#submitForm').submit();
        });
    });

</script>
@endsection
