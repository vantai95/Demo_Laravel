@extends('layouts.admin')
@section('content')
@include('admin.shared.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12">
                {!! Form::model($product ,['method' => 'PATCH', 'url' => ['/admin/products', $product->id], 'files' => true,
                'id' => 'submitForm']) !!}
                @include ('admin.products.form')
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
                init: function () {
                    let instance = this;
                    instance.on('addedfile', function (file) {
                        if (this.files[5] != null) {
                            this.removeFile(this.files[4]);
                        }
                    });
                    @foreach($images as $item)
                        this.addCustomFile = function (file, thumbnail_url, response) {
                        // Push file to collection
                        file.name = "{{$item}}";
                        this.files.push(file);
                        // Emulate event to create interface
                        this.emit("addedfile", file);
                        // Add thumbnail url
                        this.emit("thumbnail", file, '{{url('images/admin/product/'.$item)}}');
                        // Add status processing to file
                        this.emit("processing", file);
                        // Add status success to file AND RUN EVENT success from response
                        this.emit("success", file, response, false);
                        // Add status complete to file
                        this.emit("complete", file);
                    };
                    this.addCustomFile({status: "success"});
                    @endforeach
                }
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
                    @if(!empty($product->homepage_image))
                        this.addCustomFile = function (file, thumbnail_url, response) {
                        // Push file to collection
                        file.name = "{{$product->homepage_image}}";
                        this.files.push(file);
                        // Emulate event to create interface
                        this.emit("addedfile", file);
                        // Add thumbnail url
                        this.emit("thumbnail", file, '{{url('images/admin/product/'.$product->homepage_image)}}');
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
