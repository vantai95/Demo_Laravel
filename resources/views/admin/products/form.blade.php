<div class="card">
    <div class="card-body">
        <div class="form-group row">
            <div class="col-lg-12 {{ $errors->has('homepage_image') ? 'has-danger' : ''}}">
                <label for="homepage_image" class="col-sm-12 col-form-label">
                    @lang('admin.products.form.homepage_image') (480x480)
                    <span class="text-danger"> *</span>
                </label>
                <div class="col-sm-12">
                    <div class="m-dropzone dropzone m-dropzone--primary dz-single-image" id="m-dropzone-one"
                        style="text-align:center">
                        <div class="m-dropzone__msg dz-message needsclick">
                            <h3 class="m-dropzone__msg-title">
                                @lang('admin.products.dropzone.label')
                            </h3>
                        </div>
                    </div>
                    {!! $errors->first('homepage_image', '
                    <p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12 {{ $errors->has('image_0') ? 'has-danger' : ''}}">
                <label for="category_id" class="col-sm-12 col-form-label">
                    @lang('admin.products.form.image') (482x455)
                    <span class="text-danger"> *</span>
                </label>
                <div class="col-sm-12">
                    <div class="m-dropzone dropzone m-dropzone--primary dz-single-image" id="m-dropzone-two"
                        style="text-align:center">
                        <div class="m-dropzone__msg dz-message needsclick">
                            <h3 class="m-dropzone__msg-title">
                                @lang('admin.products.dropzone.label')
                            </h3>
                        </div>
                    </div>
                    {!! $errors->first('image_0', '
                    <p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-6 {{ $errors->has('title_en') ? 'has-danger' : ''}}">
                <label for="category_id" class="col-sm-12 col-form-label">
                    @lang('admin.products.form.category')
                    <span class="text-danger"> *</span>
                </label>
                <div class="col-sm-12">
                    <select class="form-control" name="category_id">
                        <option disabled value="" {{ ($categories == "" ? 'selected' : '') }}>
                            @lang('admin.products.categories.all')
                        </option>
                        @foreach($categories as $key => $value)
                        <option value="{{$key}}" {{ ($categoryId == $key? 'selected' : '') }}>
                            {{$value}}
                        </option>
                        @endforeach
                    </select>
                    {!! $errors->first('category_id',
                    '<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-6 {{ $errors->has('title_en') ? 'has-danger' : ''}}">
                <label for="category_id" class="col-sm-12 col-form-label">
                    @lang('admin.products.form.title_en')
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
                    @lang('admin.products.form.title_vi')
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

        <div class="form-group row">
            <div class="col-lg-6 {{ $errors->has('content_en') ? 'has-danger' : ''}}">
                <label for="content_en" class="col-sm-12 col-form-label">
                    @lang('admin.products.form.content_en')
                    <span class="text-danger"> *</span>
                </label>
                <div class="col-sm-12">
                    {!! Form::textarea('content_en', null, ['class' => 'form-control summernote', 'rows' => 7]) !!} {!! $errors->first('content_en',
                    '
                    <p class="text-danger">:message</p>') !!}
                </div>
            </div>
            <div class="col-lg-6 {{ $errors->has('content_vi') ? 'has-danger' : ''}}">
                <label for="content_vi" class="col-sm-12 col-form-label">
                    @lang('admin.products.form.content_vi')
                    <span class="text-danger"> *</span>
                </label>
                <div class="col-sm-12">
                    {!! Form::textarea('content_vi', null, ['class' => 'form-control summernote', 'rows' => 7]) !!} {!! $errors->first('content_vi',
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
                <a href="{{url('admin/products')}}" class="btn btn-outline-secondary">
                    @lang('admin.buttons.cancel')
                </a>
            </div>
        </div>
    </div>
</div>
