<div class="card">
    <div class="card-body">
        <div class="form-group row">
            <div class="col-lg-6 {{ $errors->has('name') ? 'has-danger' : ''}}">
                <label for="name" class="col-sm-12 col-form-label">
                    @lang('admin.contacts.form.name')
                </label>
                <div class="col-sm-12">
                    {!! Form::text('name', $contact['name'], ['class' => 'form-control', 'aria-invalid' => 'true'
                    ]) !!}
                </div>
            </div>
            <div class="col-lg-6 {{ $errors->has('email') ? 'has-danger' : ''}}">
                <label for="email" class="col-sm-12 col-form-label">
                    @lang('admin.contacts.form.email')
                </label>
                <div class="col-sm-12">
                    {!! Form::text('email', $contact['email'], ['class' => 'form-control', 'aria-invalid' => 'true'
                    ]) !!}
                </div>
            </div>
            <div class="col-lg-6 {{ $errors->has('phone') ? 'has-danger' : ''}}">
                <label for="phone" class="col-sm-12 col-form-label">
                    @lang('admin.contacts.form.phone')
                </label>
                <div class="col-sm-12">
                    {!! Form::text('phone', $contact['phone'], ['class' => 'form-control', 'aria-invalid' => 'true'
                    ]) !!}
                </div>
            </div>
            <div class="col-lg-6 {{ $errors->has('content') ? 'has-danger' : ''}}">
                <label for="content" class="col-sm-12 col-form-label">
                    @lang('admin.contacts.form.content')
                </label>
                <div class="col-sm-12">
                    {!! Form::textarea('content', $contact['content'], ['class' => 'form-control', 'aria-invalid' =>
                    'true'
                    ]) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer">
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="{{url('admin/contacts')}}" class="btn btn-outline-secondary">
                    @lang('admin.buttons.cancel')
                </a>
            </div>
        </div>
    </div>
</div>