@extends('layouts.admin.app')

@section('page-header')
@include('layouts.admin.page-header')
@stop
@section('content')
        <!-- Simple lists -->
<div class="row">
    <div class="col-md-12">
        <!-- Table header styling -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Table List Portal</h5>
                <div class="heading-elements">

                </div>
            </div>
            <div class="panel-body">
                {{--include notification--}}
                @include('flash::message')
                {{--end include notification--}}
                <div class="table-responsive col-sm-12" style="padding: 0.5px !important;">
                    <table class="table">
                        <thead>
                        <tr class="bg-teal-400">
                            <th>#</th>
                            <th>Nama</th>
                            <th>Judul</th>
                            <th>Jumlah Menu</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody class="table-bordered">
                        @foreach($portals as $key => $portal)
                            <tr>
                                <td>{{ ($key+1) }}</td>
                                <td>{{ $portal->portal_nm }}</td>
                                <td>{{ $portal->site_title  }}</td>
                                <td>{{ $portal->navs->count() }}</td>
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li class="text-primary-600"><a href="{{ route('navs.view',$portal->id  ) }}"><i class="icon-pencil7"></i></a></li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /table header styling -->
    </div>
</div>
<!-- /simple lists -->
@endsection
