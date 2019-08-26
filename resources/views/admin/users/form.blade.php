<div class="card">
    <div class="card-body">
        <div class="form-group row">
            <div class="col-lg-6 {{ $errors->has('name') ? 'has-danger' : ''}}">
                <label for="name" class="col-sm-12 col-form-label">
                    @lang('admin.users.form.name')
                    <span class="text-danger"> *</span>
                </label>
                <div class="col-sm-12">
                    {!! Form::text('name', $user['name'], ['class' => 'form-control', 'aria-invalid' => 'true']) !!} {!!
                    $errors->first('title_vi',
                    '
                    <p class="text-danger">:message</p>') !!}
                </div>
            </div>
            <div class="col-lg-6 {{ $errors->has('email') ? 'has-danger' : ''}}">
                <label for="email" class="col-sm-12 col-form-label">
                    @lang('admin.users.form.email')
                    <span class="text-danger"> *</span>
                </label>
                <div class="col-sm-12">
                    {!! Form::text('email', $user['email'], ['class' => 'form-control', 'aria-invalid' => 'true',
                    'disabled']) !!} {!!
                    $errors->first('email',
                    '
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
                @if ($isMyProfile)
                <a href="{{url('admin/my-profile')}}" class="btn btn-outline-secondary">
                    @lang('admin.buttons.cancel')
                </a>
                @else
                <a href="{{url('admin')}}" class="btn btn-outline-secondary">
                    @lang('admin.buttons.cancel')
                </a>
                @endif
            </div>
        </div>
    </div>
</div>