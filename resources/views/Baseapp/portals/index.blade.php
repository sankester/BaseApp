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
                    <a href="{{ route('portals.create') }}" class="btn btn-xs border-slate text-slate-800 btn-flat btn-rounded">
                        Tambah Portal
                    </a>
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
                            <th>Site Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody class="table-bordered">
                        @foreach($portals as $key => $portal)
                            <tr>
                                <td>{{ (($portals->currentPage() - 1 ) * $portals->perPage() ) + ($key+1) }}</td>
                                <td>{{$portal->portal_nm}}</td>
                                <td>{{$portal->site_title}}</td>
                                <td>{{$portal->site_desc}}</td>
                                <td>
                                    <ul class="icons-list">
                                        <li class="text-primary-600"><a href="{{ route('portals.edit',$portal->id) }}"><i class="icon-pencil7"></i></a></li>
                                        <li class="text-danger-600"><a href="#" class="delete-portal"  data-url ="{{ route('portals.destroy',$portal->id) }}" data-token="{{ csrf_token() }}"><i class="icon-trash"></i></a></li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-6 col-xs-12 m-top-20">
                        <div class="pull-left">
                            @if ($portals->hasPages())
                            <p>
                                Halaman {{ $portals->currentPage() }} dari {{ $portals->total() }} Halaman
                            </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12 m-top-20">
                        <div class="pull-right">
                            {{--generate pagination--}}
                            {{ $portals->links()}}
                            {{-- end generate pagination--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /table header styling -->
    </div>
</div>
<!-- /simple lists -->
@endsection
