@extends('layouts.admin.app')

@section('page-header')
@include('layouts.admin.page-header')
@stop
@section('content')
        <!-- Input group addons -->
<div class="panel  panel-white">
    <div class="panel-heading">
        <h5 class="panel-title">Form Add menu</h5>
        <div class="heading-elements">
            <a href="{{ route('navs.view', $portal->id) }}" class="btn btn-xs border-slate text-slate-800 btn-flat btn-rounded">
                <i class="icon-arrow-left7 position-left"></i> Kembali
            </a>
        </div>
    </div>
    {!! Form::model($nav = new \App\Model\Nav,['url' => 'base/navs'], ['class' => 'form-horizontal form-validate-nav']) !!}
        @include('Baseapp.navs.form',['textButton' => 'Add', 'icon' => 'icon-plus3'])
    {!! Form::close() !!}
</div>
<!-- /input group addons -->
@endsection