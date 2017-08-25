@extends('layouts.admin.app')

@section('page-header')
@include('layouts.admin.page-header')
@stop
@section('content')
        <!-- Input group addons -->
<div class="panel  panel-white">
    <div class="panel-heading">
        <h5 class="panel-title">Form Edit User</h5>
        <div class="heading-elements">
            <a href="{{ route('users.index') }}" class="btn btn-xs border-slate text-slate-800 btn-flat btn-rounded">
              <i class="icon-arrow-left7 position-left"></i> Kembali
            </a>
        </div>
    </div>
    {!! Form::model($user ,['method' => 'PATCh','action' => ['BaseApp\UserController@update', $user->id]], ['class' => 'form-horizontal form-validate-user-edit']) !!}
        @include('Baseapp.users.form',['textButton' => 'Edit', 'icon' => 'icon-pencil5'])
    {!! Form::close() !!}
</div>
<!-- /input group addons -->
@endsection