<div class="card">
    <div class="card-body">
        <div class="form-group row">
            <div class="col-lg-12 {{ $errors->has('homepage_image') ? 'has-danger' : ''}}">
                <label for="homepage_image" class="col-sm-12 col-form-label">
                    @lang('admin.categories.form.homepage_image') (400x400)
                    <span class="text-danger"> *</span>
                </label>
                <div class="col-sm-12">
                    <div class="m-dropzone dropzone m-dropzone--primary dz-single-image" id="m-dropzone-one"
                        style="text-align:center">
                        <div class="m-dropzone__msg dz-message needsclick">
                            <h3 class="m-dropzone__msg-title">
                                @lang('admin.categories.dropzone.label')
                            </h3>
                        </div>
                    </div>
                    {!! $errors->first('homepage_image', '
                    <p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6 {{ $errors->has('jumbotron_image') ? 'has-danger' : ''}}">
                <label for="jumbotron_image" class="col-sm-12 col-form-label">
                    @lang('admin.categories.form.jumbotron_image') (500x550)
                    <span class="text-danger"> *</span>
                </label>
                <div class="col-sm-12">
                    <div class="m-dropzone dropzone m-dropzone--primary dz-single-image" id="m-dropzone-two"
                        style="text-align:center">
                        <div class="m-dropzone__msg dz-message needsclick">
                            <h3 class="m-dropzone__msg-title">
                                @lang('admin.categories.dropzone.label')
                            </h3>
                        </div>
                    </div>
                    {!! $errors->first('jumbotron_image', '
                    <p class="text-danger">:message</p>') !!}
                </div>
            </div>
            <div class="col-lg-6 {{ $errors->has('banner_image') ? 'has-danger' : ''}}">
                <label for="banner_image" class="col-sm-12 col-form-label">
                    @lang('admin.categories.form.banner_image') (658x437)
                    <span class="text-danger"> *</span>
                </label>
                <div class="col-sm-12">
                    <div class="m-dropzone dropzone m-dropzone--primary dz-single-image" id="m-dropzone-three"
                        style="text-align:center">
                        <div class="m-dropzone__msg dz-message needsclick">
                            <h3 class="m-dropzone__msg-title">
                                @lang('admin.categories.dropzone.label')
                            </h3>
                        </div>
                    </div>
                    {!! $errors->first('banner_image', '
                    <p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6 {{ $errors->has('title_en') ? 'has-danger' : ''}}">
                <label for="title_en" class="col-sm-12 col-form-label">
                    @lang('admin.categories.form.title_en')
                    <span class="text-danger"> *</span>
                </label>
                <div class="col-sm-12">
                    {!! Form::text('title_en', null, ['class' => 'form-control', 'aria-invalid' => 'true']) !!} {!!
                    $errors->first('title_en',
                    '
                    <p class="text-danger">:message</p>') !!}
                </div>
            </div>
            <div class="col-lg-6 {{ $errors->has('title_vi') ? 'has-danger' : ''}}">
                <label for="title_vi" class="col-sm-12 col-form-label">
                    @lang('admin.categories.form.title_vi')
                    <span class="text-danger"> *</span>
                </label>
                <div class="col-sm-12">
                    {!! Form::text('title_vi', null, ['class' => 'form-control', 'aria-invalid' => 'true']) !!} {!!
                    $errors->first('title_vi',
                    '
                    <p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-lg-12 text-center">
                {!! Form::button(isset($submitButtonText) ? $submitButtonText : trans('admin.buttons.update'), ['class'
                => 'btn btn-outline-primary',
                'id' => 'submitButton']) !!}
                <a href="{{url('admin/categories')}}" class="btn btn-outline-secondary">
                    @lang('admin.buttons.cancel')
                </a>
            </div>
        </div>
    </div>
</div>
