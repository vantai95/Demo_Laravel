@extends('layouts.admin')
@section('content')
@include('admin.shared.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
<div class="container-fluid">
    <div id="ui-view">
        <div>
            <div class="animated fadeIn">
                {!! Form::model($agent, ['method' => 'PATCH', 'url' => ['/admin/agents', $agent->id], 'files' => true])
                !!}
                @include ('admin.agents.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="quick-view-product" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-quickview woocommerce" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="google-maps" id="div-that-holds-the-iframe"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
