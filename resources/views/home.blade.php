@extends('layouts.admin.app')

@section('page-header')
   @include('layouts.admin.page-header')
@stop
@section('content')
   <div class="row">
      <div class="col-md-12">
         {{--include notification--}}
         @include('flash::message')
         {{--end include notification--}}
      </div>
   </div>
@endsection
