@extends('layouts.admin')
@section('content')
@include('admin.shared.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12">
                {!! Form::open(['url' => '/admin/categories',
                'files' => true, 'id'
                =>'submitForm']) !!}
                @include ('admin.categories.form', ['submitButtonText' => trans('admin.buttons.create')])
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
