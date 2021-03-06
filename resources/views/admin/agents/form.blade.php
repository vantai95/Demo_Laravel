<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="form-group col-lg-6 {{ $errors->has('name_en') ? 'has-danger' : ''}}">
                <label for="name_en" class="col-sm-12 col-form-label">
                    @lang('admin.agents.form.name_en')
                </label>
                <div class="col-sm-12">
                    {!! Form::textarea('name_en', $agent['name_en'], ['class' => 'form-control','rows' =>
                    5,'aria-invalid' => 'true'
                    ]) !!}
                </div>
            </div>
            <div class="form-group col-lg-6 {{ $errors->has('name_vi') ? 'has-danger' : ''}}">
                <label for="name_vi" class="col-sm-12 col-form-label">
                    @lang('admin.agents.form.name_vi')
                </label>
                <div class="col-sm-12">
                    {!! Form::textarea('name_vi', $agent['name_vi'], ['class' => 'form-control','rows' =>
                    5,'aria-invalid' => 'true'
                    ]) !!}
                </div>
            </div>
            <div class="form-group col-lg-6 {{ $errors->has('address_en') ? 'has-danger' : ''}}">
                <label for="address_en" class="col-sm-12 col-form-label">
                    @lang('admin.agents.form.address_en')
                </label>
                <div class="col-sm-12">
                    {!! Form::textarea('address_en', $agent['address_en'], ['class' => 'form-control','rows' =>
                    5,'aria-invalid' => 'true'
                    ]) !!}
                </div>
            </div>
            <div class="form-group col-lg-6 {{ $errors->has('address_vi') ? 'has-danger' : ''}}">
                <label for="email" class="col-sm-12 col-form-label">
                    @lang('admin.agents.form.address_vi')
                </label>
                <div class="col-sm-12">
                    {!! Form::textarea('address_vi', $agent['address_vi'], ['class' => 'form-control','rows' =>
                    5,'aria-invalid' => 'true'
                    ]) !!}
                </div>
            </div>
            <div class="form-group col-lg-6 {{ $errors->has('email') ? 'has-danger' : ''}}">
                <label for="content" class="col-sm-12 col-form-label">
                    @lang('admin.agents.form.email')
                </label>
                <div class="col-sm-12">
                    {!! Form::text('email', $agent['email'], ['class' => 'form-control', 'aria-invalid' =>
                    'true'
                    ]) !!}
                </div>
            </div>
            <div class="form-group col-lg-6 {{ $errors->has('phone') ? 'has-danger' : ''}}">
                <label for="phone" class="col-sm-12 col-form-label">
                    @lang('admin.agents.form.phone')
                </label>
                <div class="col-sm-12">
                    {!! Form::text('phone', $agent['phone'], ['class' => 'form-control', 'aria-invalid' => 'true'
                    ]) !!}
                </div>
            </div>
            <div class="form-group col-lg-12 {{ $errors->has('iframe') ? 'has-danger' : ''}}">
                <label for="iframe" class="col-sm-12 col-form-label">
                    @lang('admin.agents.form.google_maps')
                </label>
                <div class="col-sm-12">
                    {!! Form::textarea('iframe', $agent['iframe'], ['class' => 'form-control b','rows' => 5,'id' =>
                    'iframe', 'aria-invalid' =>
                    'true'
                    ]) !!}
                    <a class="btn btn-sm btn-info float-right" style="margin-top: 10px; cursor: pointer;" onclick="getIframe()">
                        <i class="fa fa-map"></i> @lang('admin.agents.form.preview')
                    </a>
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
                <a href="{{url('admin/agents')}}" class="btn btn-outline-secondary">
                    @lang('admin.buttons.cancel')
                </a>
            </div>
        </div>
    </div>
</div>
