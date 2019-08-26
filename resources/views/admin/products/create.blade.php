@extends('layouts.admin')
@section('content')
@include('admin.shared.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12">
                {!! Form::open(['url' => '/admin/products',
                'files' => true, 'id'
                =>'submitForm']) !!}
                @include ('admin.products.form', ['submitButtonText' => trans('admin.buttons.create')])
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
                autoProcessQueue: true,
                parallelUploads: 2,
                uploadMultiple: true,
                paramName: "file",
                maxFiles: 5,
                acceptedFiles: "image/*",
                dictRemoveFile: 'Remove image',
                dictFileTooBig: 'Image is larger than 10MB',
                init: function () {
                    let instance = this;
                    instance.on('addedfile', function (file) {
                        if (this.files[5] != null) {
                            this.removeFile(this.files[4]);
                        }
                    });
                },
                maxFilesize: 10,
                addRemoveLinks: !0,
                thumbnailWidth: null,
                thumbnailHeight: null,
                accept: function (e, o) {
                    "image.jpg" == e.name ? o("No, you don't.") : o()
                },
                'url': "{{ url('admin/products/upload') }}",
                "headers":
                    {
                        'X-CSRF-TOKEN': token
                    },
            }
        }
    };

    var DropzoneDemo2 = {
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
                'url': "{{ url('admin/products/upload') }}",
                "headers":
                    {
                        'X-CSRF-TOKEN': token
                    },
            }
        }
    };

    DropzoneDemo.init();
    DropzoneDemo2.init();
    $(document).ready(function () {
        $("#submitButton").click(function () {
            $('#m-dropzone-one').find('img').each(function () {
                $('#submitForm').append('<input type="hidden" name="homepage_image" value="' + $(this).attr('src') + '" />');
            });
            $('#m-dropzone-two').each(function () {
                let count = $(this).find('img').length;
                if(count == 0){
                    $('#submitForm').append('<input type="hidden" name="image_0" value=" " /> ');
                }else{
                    $(this).find('img').each(function (index) {
                        $('#submitForm').append('<input type="hidden" name="image_'+ index + '" value="' + $(this).attr('src') + '" /> ');
                    })
                }
            });
            $('#submitForm').submit();
        });
    });

</script>
@endsection
