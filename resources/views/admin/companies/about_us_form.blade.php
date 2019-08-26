<div class="card">
    <div class="card-body">
        <div class="form-group row">
            <div class="col-lg-12 {{ $errors->has('introduction_image') ? 'has-danger' : ''}}">
                <label for="introduction_image" class="col-sm-12 col-form-label">
                    @lang('admin.companies.form.introduction_image') (570x450)
                    <span class="text-danger"> *</span>
                </label>
                <div class="col-sm-12" id="{{ $company->introduction_image }}">
                    <div class="m-dropzone m-dropzone-about m-dropzone_introduction_image dropzone m-dropzone--primary dz-single-image" id="introduction_image"
                        style="text-align:center">
                        <div class="m-dropzone__msg dz-message needsclick">
                            <h3 class="m-dropzone__msg-title">
                                @lang('admin.companies.dropzone.label')
                            </h3>
                        </div>
                    </div>
                    {!! $errors->first('introduction_image', '
                    <p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-6 {{ $errors->has('introduction_en') ? 'has-danger' : ''}}">
                <label for="introduction_en" class="col-sm-12 col-form-label">
                    @lang('admin.companies.form.introduction_en')
                </label>
                <div class="col-sm-12">
                    {!! Form::textarea('introduction_en', $company['introduction_en'], ['class' => 'form-control
                    b','rows' => 10,'id' => 'introduction_en', 'aria-invalid' => 'true']) !!}
                    {!! $errors->first('introduction_en', '
                    <p class="text-danger">:message</p>') !!}
                </div>
            </div>
            <div class="col-lg-6 {{ $errors->has('introduction_vi') ? 'has-danger' : ''}}">
                <label for="introduction_vi" class="col-sm-12 col-form-label">
                    @lang('admin.companies.form.introduction_vi')
                </label>
                <div class="col-sm-12">
                    {!! Form::textarea('introduction_vi', $company['introduction_vi'], ['class' => 'form-control b','rows' => 10,'id' =>
                    'introduction_vi', 'aria-invalid' => 'true' ]) !!}
                    {!! $errors->first('introduction_vi', '
                    <p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-12 {{ $errors->has('goal_image') ? 'has-danger' : ''}}">
                <label for="goal_image" class="col-sm-12 col-form-label">
                    @lang('admin.companies.form.goal_image') (570x450)
                    <span class="text-danger"> *</span>
                </label>
                <div class="col-sm-12" id="{{ $company->goal_image }}">
                    <div class="m-dropzone m-dropzone-about m-dropzone_goal_image dropzone m-dropzone--primary dz-single-image" id="goal_image"
                        style="text-align:center">
                        <div class="m-dropzone__msg dz-message needsclick">
                            <h3 class="m-dropzone__msg-title">
                                @lang('admin.companies.dropzone.label')
                            </h3>
                        </div>
                    </div>
                    {!! $errors->first('goal_image', '
                    <p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-6 {{ $errors->has('goal_en') ? 'has-danger' : ''}}">
                <label for="goal_en" class="col-sm-12 col-form-label">
                    @lang('admin.companies.form.goal_en')
                </label>
                <div class="col-sm-12">
                    {!! Form::textarea('goal_en', $company['goal_en'], ['class' => 'form-control
                    b','rows' => 10,'id' => 'goal_en', 'aria-invalid' => 'true']) !!}
                     {!! $errors->first('goal_en', '
                     <p class="text-danger">:message</p>') !!}
                </div>
            </div>
            <div class="col-lg-6 {{ $errors->has('goal_vi') ? 'has-danger' : ''}}">
                <label for="goal_vi" class="col-sm-12 col-form-label">
                    @lang('admin.companies.form.goal_vi')
                </label>
                <div class="col-sm-12">
                    {!! Form::textarea('goal_vi', $company['goal_vi'], ['class' => 'form-control b','rows' => 10,'id' =>
                    'goal_vi', 'aria-invalid' => 'true' ]) !!}
                     {!! $errors->first('goal_vi', '
                     <p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-3 {{ $errors->has('total_happy_customers') ? 'has-danger' : ''}}">
                <label for="total_happy_customers" class="col-sm-12 col-form-label">
                    @lang('admin.companies.form.total_happy_customers')
                </label>
                <div class="col-sm-12">
                    {!! Form::text('total_happy_customers', $company['total_happy_customers'], ['class' => 'form-control', 'aria-invalid' => 'true', 'onkeypress' => 'return isNumber(event)']) !!}
                    {!! $errors->first('total_happy_customers', '
                    <p class="text-danger">:message</p>') !!}
                </div>
            </div>
            <div class="col-lg-3 {{ $errors->has('total_stores') ? 'has-danger' : ''}}">
                <label for="total_stores" class="col-sm-12 col-form-label">
                    @lang('admin.companies.form.total_stores')
                </label>
                <div class="col-sm-12">
                    {!! Form::text('total_stores', $company['total_stores'], ['class' => 'form-control', 'aria-invalid' => 'true', 'onkeypress' => 'return isNumber(event)']) !!}
                    {!! $errors->first('total_stores', '
                    <p class="text-danger">:message</p>') !!}
                </div>
            </div>
            <div class="col-lg-3 {{ $errors->has('total_experience_years') ? 'has-danger' : ''}}">
                <label for="total_experience_years" class="col-sm-12 col-form-label">
                    @lang('admin.companies.form.total_experience_years')
                </label>
                <div class="col-sm-12">
                    {!! Form::text('total_experience_years', $company['total_experience_years'], ['class' => 'form-control', 'aria-invalid' => 'true', 'onkeypress' => 'return isNumber(event)']) !!}
                    {!! $errors->first('total_experience_years', '
                    <p class="text-danger">:message</p>') !!}
                </div>
            </div>
            <div class="col-lg-3 {{ $errors->has('total_active_projects') ? 'has-danger' : ''}}">
                <label for="total_active_projects" class="col-sm-12 col-form-label">
                    @lang('admin.companies.form.total_active_projects')
                </label>
                <div class="col-sm-12">
                    {!! Form::text('total_active_projects', $company['total_active_projects'], ['class' => 'form-control', 'aria-invalid' => 'true', 'onkeypress' => 'return isNumber(event)']) !!}
                    {!! $errors->first('total_active_projects', '
                    <p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer">
        <div class="row">
            <div class="col-lg-12 text-center">
                {!! Form::submit(isset($submitButtonText) ? $submitButtonText : trans('admin.buttons.update'), ['class'
                => 'btn btn-outline-primary',
                'id' => 'submitButton']) !!}
                <a href="{{url('admin/companies')}}" class="btn btn-outline-secondary">
                    @lang('admin.buttons.cancel')
                </a>
            </div>
        </div>
    </div>
</div>
