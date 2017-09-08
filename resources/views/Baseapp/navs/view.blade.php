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
                <h5 class="panel-title">Table List Menu</h5>
                <div class="heading-elements">
                    <a href="{{ route('navs.create', $portal->id ) }}"
                       class="btn btn-xs border-primary text-primary-800 btn-flat btn-rounded">
                        <i class="icon-plus-circle2 position-left"></i>
                        Tambah Menu
                    </a>
                    <a href="{{ route('navs.index', $portal->id ) }}"
                       class="btn btn-xs  border-slate text-slate-800  btn-flat btn-rounded">
                        <i class="icon-arrow-left7 position-left"></i>
                        Kembali
                    </a>
                </div>
            </div>
            <div class="panel-body">)
                    {{--include notification--}}
                    @include('flash::message')
                    {{--end include notification--}}
                    <div class="table-responsive col-sm-12" style="padding: 0.5px !important;">
                        <table class="table">
                            <thead>
                            <tr class="bg-teal-400">
                                <th>#</th>
                                <th>Nama</th>
                                <th>Url</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody class="table-bordered">
                            @forelse($listMenu as $key => $menu)
                                <tr>
                                    <td class="text-center">{{ ($key+1) }}</td>
                                    <td>{{ $menu['nav_title'] }}</td>
                                    <td>{{ $menu['nav_url'] }}</td>
                                    <td class="text-center">{{ $menu['nav_st'] }}</td>
                                    <td class="text-center">
                                        <ul class="icons-list">
                                            <li class="text-primary-600"><a
                                                        href="{{ route('navs.edit',[ $portal->id,$menu['id']] ) }}"><i
                                                            class="icon-pencil7"></i></a></li>
                                            <li class="text-danger-600"><a href="#" class="delete-nav"
                                                                           data-url="{{ route('navs.destroy',$menu['id']) }}"
                                                                           data-token="{{ csrf_token() }}"><i
                                                            class="icon-trash"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        <div class="alert alert-info alert-bordered">
                                            <span class="text-semibold">Info !</span> Tidak ada menu untuk portal ini.
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
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
