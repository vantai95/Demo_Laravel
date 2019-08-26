@extends('layouts.admin')
@section('content')
@include('admin.shared.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12">
                {!! Form::open(['method' => 'POST', 'url' => ['/admin/configurations'], 'files' => true,
                'id' => 'submitForm']) !!}
                @include ('admin.configurations.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra_scripts')
<script>
    var token = $('input[name="_token"]').val();

        $('.m-dropzone').each(function( index ) {
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
                'url': "{{ url('/admin/configurations/upload') }}",
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
                        this.emit("thumbnail", file,'{{url('/images/admin/configuration')}}' +'/'+ img);
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
                $('.m-dropzone').each(function (index) {
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
