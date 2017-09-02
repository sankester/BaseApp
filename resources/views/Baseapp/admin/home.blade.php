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
      <div class="col-md-3">
         <div class="panel panel-body bg-teal-800 has-bg-image">
            <div class="media no-margin">
               <div class="media-body">
                  <h3 class="no-margin">{{ $countUser }}</h3>
                  <span class="text-uppercase text-size-mini">User</span>
               </div>

               <div class="media-right media-middle">
                  <i class="icon-users icon-3x opacity-75"></i>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-3">
         <div class="panel panel-body bg-blue-800 has-bg-image">
            <div class="media no-margin">
               <div class="media-body">
                  <h3 class="no-margin">{{ $countRole }}</h3>
                  <span class="text-uppercase text-size-mini">Role</span>
               </div>

               <div class="media-right media-middle">
                  <i class="icon-users4 icon-3x opacity-75"></i>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-3">
         <div class="panel panel-body bg-orange-800   has-bg-image">
            <div class="media no-margin">
               <div class="media-body">
                  <h3 class="no-margin">{{ $countPortal }}</h3>
                  <span class="text-uppercase text-size-mini">Portal</span>
               </div>

               <div class="media-right media-middle">
                  <i class="icon-earth icon-3x opacity-75"></i>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-3">
         <div class="panel panel-body bg-pink-800 has-bg-image">
            <div class="media no-margin">
               <div class="media-body">
                  <h3 class="no-margin">{{ $countNav }}</h3>
                  <span class="text-uppercase text-size-mini">Menu</span>
               </div>

               <div class="media-right media-middle">
                  <i class=" icon-menu7 icon-3x opacity-75"></i>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
