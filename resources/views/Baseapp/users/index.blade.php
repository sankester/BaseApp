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
                    <h5 class="panel-title">Table List User</h5>
                    <div class="heading-elements">
                        <a href="{{ route('users.create') }}" class="btn btn-xs border-slate text-slate-800 btn-flat btn-rounded">
                            Tambah User
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
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody class="table-bordered">
                            @forelse($users as $key => $user)
                            <tr>
                                <td>{{ (($users->currentPage() - 1 ) * $users->perPage() ) + ($key+1) }}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role->role_nm}}</td>
                                <td>
                                    <ul class="icons-list">
                                        <li class="text-primary-600"><a href="{{ route('users.edit',$user->id) }}"><i class="icon-pencil7"></i></a></li>
                                        <li class="text-danger-600"><a href="#" class="delete-user" data-id="{{$user->id}}" data-url ="{{ route('users.destroy',$user->id) }}" data-token="{{ csrf_token() }}"><i class="icon-trash"></i></a></li>
                                    </ul>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <div class="alert alert-info alert-bordered">
                                            <span class="text-semibold">Info !</span> Data tidak ditemukan.
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-6 col-xs-12 m-top-20">
                            <div class="pull-left">
                                @if ($users->hasPages())
                                <p>
                                    Halaman {{ $users->currentPage() }} dari {{ $users->total() }} Halaman
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 m-top-20">
                            <div class="pull-right">
                                {{--generate pagination--}}
                                {{ $users->links()}}
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
