@extends('layouts.admin.app')
@section('page-header')
    @include('layouts.admin.page-header')
@stop
@section('content')
    <!-- Input group addons -->
    <div class="panel  panel-white">
        <div class="panel-heading">
            <h5 class="panel-title">Form Edit Role</h5>
            <div class="heading-elements">
                <a href="{{ route('roles.index') }}" class="btn btn-xs border-slate text-slate-800 btn-flat btn-rounded">
                    <i class="icon-arrow-left7 position-left"></i> Kembali
                </a>
            </div>
        </div>
        {!! Form::model($role ,['method' => 'PATCH','action' => ['BaseApp\RoleController@update', $role->id]], ['class' => 'form-horizontal form-validate-role']) !!}
            @include('Baseapp.roles.form',['textButton' => 'Edit', 'icon' => 'icon-pencil5'])
        {!! Form::close() !!}
    </div>
    <!-- /input group addons -->
@endsection