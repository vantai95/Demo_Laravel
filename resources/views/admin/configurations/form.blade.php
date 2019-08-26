<div class="card">
    <div class="card-body">
        <div class="form-group row">
            @foreach ($configurations as $item)
            <div
                class="@if($loop->first) col-lg-12 @else col-lg-6 @endif  {!! $errors->has('image_{{$item->config_key}}') ? 'has-danger' : ''!!}">
                <label for="{{$item->config_key}}" class="col-sm-12 col-form-label">
                    {{$item->config_key}} @if($item->config_key == 'HOMEPAGE_BANNER') (1900X900) @else
                      (658x437) @endif
                    <span class="text-danger"> *</span>
                </label>
                <div class="col-sm-12" id="{{ $item->config_value }}">
                    <div class="m-dropzone {{'m-dropzone_'.$item->config_key}} dropzone m-dropzone--primary dz-single-image"
                        id="{{$item->config_key}}" style="text-align:center">
                        <div class="m-dropzone__msg dz-message needsclick">
                            <h3 class="m-dropzone__msg-title">
                                @lang('admin.configurations.dropzone.label')
                            </h3>
                        </div>
                    </div>
                    {!! $errors->first('image_{{$item->config_key}}', '
                    <p class="text-danger">:message</p>') !!}
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="card-footer">
        <div class="row">
            <div class="col-lg-12 text-center">
                {!! Form::submit(isset($submitButtonText) ? $submitButtonText : trans('admin.buttons.update'), ['class'
                => 'btn btn-outline-primary',
                'id' => 'submitButton']) !!}
                <a href="{{url('admin/configurations')}}" class="btn btn-outline-secondary">
                    @lang('admin.buttons.cancel')
                </a>
            </div>
        </div>
    </div>
</div>
