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
                <h5 class="panel-title">Table List Role</h5>
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
                            <th>Portal</th>
                            <th>Role</th>
                            <th>Deskrisi</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody class="table-bordered">
                        @foreach($roles as $key => $role)
                            <tr>
                                <td class="text-center">{{ (($roles->currentPage() - 1 ) * $roles->perPage() ) + ($key+1) }}</td>
                                <td>{{$role->portal->portal_nm}}</td>
                                <td>{{$role->role_nm}}</td>
                                <td>{{$role->role_desc}}</td>
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li class="text-primary-600"><a href="{{ route('permissions.edit',$role->id) }}"><i class="icon-pencil7"></i></a></li>
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
                            @if ($roles->hasPages())
                                <p>
                                    Halaman {{ $roles->currentPage() }} dari {{ $roles->total() }} Halaman
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12 m-top-20">
                        <div class="pull-right">
                            {{--generate pagination--}}
                            {{ $roles->links()}}
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
