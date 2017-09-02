@extends('layouts.admin.app')

@section('page-header')
@include('layouts.admin.page-header')
@stop
@section('content')
        <!-- Input group addons -->
<div class="panel  panel-white">
    <div class="panel-heading">
        <h5 class="panel-title">Form Add Role</h5>
        <div class="heading-elements">
            <a href="{{ route('roles.index') }}" class="btn btn-xs border-slate text-slate-800 btn-flat btn-rounded">
                <i class="icon-arrow-left7 position-left"></i> Kembali
            </a>
        </div>
    </div>
    {!! Form::model($role = new \App\Model\Role(),['url' => 'base/roles'], ['class' => 'form-horizontal form-validate-role ']) !!}
        @include('Baseapp.roles.form',['textButton' => 'Add', 'icon' => 'icon-plus3'])
    {!! Form::close() !!}
</div>
<!-- /input group addons -->
@endsection