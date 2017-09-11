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
   <h6 class="content-group text-semibold">
      Aktifitas Terakhir
   </h6>
   <div class="row">
      <div class="col-md-12" id="list-log">
         <div class="timeline timeline-left">
            <div class="timeline-container">
            @forelse($logs as $log)
               <!-- Logs -->
                  <div class="timeline-row">
                     <div class="timeline-icon">
                        <a href="#">
                           {{Html::image('theme/admin-template/images/placeholder.jpg', 'log', ['class' => 'img-circle'])}}
                        </a>
                     </div>
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="panel panel-flat timeline-content">
                              <div class="panel-heading">
                                 <h6 class="panel-title">{{ $log->user->name }}<a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
                                 <div class="heading-elements">
                                    <span class="heading-text"><i class="icon-checkmark-circle position-left text-success"></i> {{ $log->created_at->diffForHumans()}}</span>
                                    <ul class="icons-list">
                                    </ul>
                                 </div>
                              </div>

                              <div class="panel-body">
                                 <h6 class="content-group">
                                    <i class="icon-user-check position-left"></i>
                                    <a href="#"></a> {{ $log->action }}:
                                 </h6>

                                 <blockquote>
                                    <p>{!! $log->description !!} </p>
                                    <footer>{{ $log->user->username }}, <cite title="Source Title">{{ $log->created_at->format('h:i A') }}</cite></footer>
                                 </blockquote>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /Logs -->
               @empty
                  <div class="col-md-12">
                     <div class="alert alert-info alert-bordered">
                        <span class="text-semibold">Info !</span> Data tidak ditemukan.
                     </div>
                  </div>
               @endforelse
            </div>
            {{--{!! $logs->links() !!}--}}
         </div>
      </div>
      <div class="col-md-12 text-center" id="load-section">
         <button type="button" class="btn bg-teal btn-ladda btn-ladda-load ladda-button" data-style="slide-up" data-spinner-size="20" data-url="{{ route('base.page') }}">
            <span class="ladda-label">Load More</span>
            <span class="ladda-spinner"></span>
            <div class="ladda-progress" style="width: 159px;"></div>
         </button>
      </div>
   </div>
@endsection

