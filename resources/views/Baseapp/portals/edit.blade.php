@extends('layouts.admin.app')

@section('page-header')
@include('layouts.admin.page-header')
@stop
@section('content')
        <!-- Input group addons -->
<div class="panel  panel-white">
    <div class="panel-heading">
        <h5 class="panel-title">Form Edit Portal</h5>
        <div class="heading-elements">
            <a href="{{ route('portals.index') }}" class="btn btn-xs border-slate text-slate-800 btn-flat btn-rounded">
                <i class="icon-arrow-left7 position-left"></i> Kembali
            </a>
        </div>
    </div>
    {!! Form::model($portal ,['method' => 'PATCH','action' => ['BaseApp\PortalController@update', $portal->id]], ['class' => 'form-horizontal form-validate-portal']) !!}
        @include('Baseapp.portals.form',['textButton' => 'Edit', 'icon' => 'icon-pencil5'])
    {!! Form::close() !!}
</div>
<!-- /input group addons -->
@endsection