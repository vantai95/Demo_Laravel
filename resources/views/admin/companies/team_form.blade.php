<div class="card">
        <div class="card-body">
            <div class="form-group row">
                <div class="col-lg-12 {{ $errors->has('avatar_image') ? 'has-danger' : ''}}">
                    <label for="avatar_image" class="col-sm-12 col-form-label">
                        @lang('admin.companies.team.form.avatar_image') (540x540)
                        <span class="text-danger"> *</span>
                    </label>
                    <div class="col-sm-12">
                        <div class="m-dropzone m-dropzone-team dropzone m-dropzone--primary dz-single-image" id="m-dropzone-two"
                            style="text-align:center">
                            <div class="m-dropzone__msg dz-message needsclick">
                                <h3 class="m-dropzone__msg-title">
                                    @lang('admin.categories.dropzone.label')
                                </h3>
                            </div>
                        </div>
                        {!! $errors->first('avatar_image', '
                        <p class="text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-6 {{ $errors->has('full_name') ? 'has-danger' : ''}}">
                    <label for="full_name" class="col-sm-12 col-form-label">
                        @lang('admin.companies.team.form.full_name')
                        <span class="text-danger"> *</span>
                    </label>
                    <div class="col-sm-12">
                        {!! Form::text('full_name', null, ['class' => 'form-control', 'aria-invalid' => 'true']) !!} {!!
                        $errors->first('full_name',
                        '
                        <p class="text-danger">:message</p>') !!}
                    </div>
                </div>
                <div class="col-lg-6 {{ $errors->has('title') ? 'has-danger' : ''}}">
                    <label for="title" class="col-sm-12 col-form-label">
                        @lang('admin.companies.team.form.title')
                        <span class="text-danger"> *</span>
                    </label>
                    <div class="col-sm-12">
                        {!! Form::text('title', null, ['class' => 'form-control', 'aria-invalid' => 'true']) !!} {!!
                        $errors->first('title',
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
                    'id' => 'submitTeamButton']) !!}
                    <a href="{{url('admin/companies?activeTeamTab=1')}}" class="btn btn-outline-secondary">
                        @lang('admin.buttons.cancel')
                    </a>
                </div>
            </div>
        </div>
    </div>
