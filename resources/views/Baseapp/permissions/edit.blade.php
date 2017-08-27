@extends('layouts.admin.app')

@section('page-header')
@include('layouts.admin.page-header')
@stop
@section('content')
        <!-- Simple lists -->
<div class="row">
    <div class="col-md-12">
        <!-- Table header styling -->
        <div class="panel  panel-white">
            <div class="panel-heading">
                <h5 class="panel-title">Table List Permissions</h5>
                <div class="heading-elements">
                    <a href="{{ route('permissions.index') }}"
                       class="btn btn-xs border-slate text-slate-800 btn-flat btn-rounded">
                        <i class="icon-arrow-left7 position-left"></i> Kembali
                    </a>
                </div>
            </div>
            @if(!empty($listMenu))
                {!! Form::open(['route' => ['permissions.update', $role->id]]) !!}
                <div class="panel-body">
                    {{--include notification--}}
                    @include('flash::message')
                    {{--end include notification--}}
                    <div class="table-responsive col-sm-12" style="padding: 0.5px !important;">
                        <table class="table">
                            <thead>
                            <tr class="bg-teal-400">
                                <th width="5%">#</th>
                                <th width="20%">Nama</th>
                                <th>Cread</th>
                                <th>Read</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody class="table-bordered">
                            @foreach($listMenu as $key => $menu)
                                <tr>
                                    {!! Form::hidden('roles['.$key.'][nav_id]', $menu->id) !!}
                                    <td class="text-center">{{ ($key+1) }}</td>
                                    <td>{{ $menu->nav_title }}</td>
                                    <td class="text-center">
                                        {!! Form::checkbox('roles['.$key.'][c]',1, isset($menu->roles->first()->pivot->c) ?  $menu->roles->first()->pivot->c :  0 ) !!}
                                    </td>
                                    <td class="text-center">
                                        {!! Form::checkbox('roles['.$key.'][r]',1, isset($menu->roles->first()->pivot->r) ?  $menu->roles->first()->pivot->c :  0  ) !!}
                                    </td>
                                    <td class="text-center">
                                        {!! Form::checkbox('roles['.$key.'][u]',1, isset($menu->roles->first()->pivot->c) ?  $menu->roles->first()->pivot->u :  0  ) !!}
                                    </td>
                                    <td class="text-center">
                                        {!! Form::checkbox('roles['.$key.'][d]',1, isset($menu->roles->first()->pivot->c) ?  $menu->roles->first()->pivot->d :  0 ) !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="text-right">
                        <button type="submit" class="btn bg-teal-400 pull-right fix-width btn-md m-right-20">
                            <i class="icon-pencil5"></i>&nbsp;&nbsp;Edit
                        </button>
                        <button type="reset" class="btn btn-default pull-right fix-width btn-md m-right-10" id="reset">
                            <i class="icon-reload-alt position-right"></i> Reset
                        </button>
                    </div>
                </div>
                {!! Form::close() !!}
            @else
                <div class="panel-body">
                    <div class="alert alert-info alert-styled-left alert-arrow-left alert-bordered">
                        <span class="text-semibold">Info !</span> Tidak ada menu untuk portal ini.
                    </div>
                </div>
            @endif
        </div>
        <!-- /table header styling -->
    </div>
</div>
<!-- /simple lists -->
@endsection
