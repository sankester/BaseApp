<div class="panel-body">
    {{--include notification--}}
    @include('flash::message')
    {{--end include notification--}}
    <div class="form-group">
        {!! Form::label('role_nm','Nama Role ',['class' => 'control-label col-lg-2']) !!}
        <div class="col-lg-10">
            {!! Form::text('role_nm',null,['class' => 'form-control ' , 'placeholder' => 'Nama Role','required' =>'required']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('role_desc','Role Description ',['class' => 'control-label col-lg-2']) !!}
        <div class="col-lg-10">
            {!! Form::text('role_desc',null,['class' => 'form-control ','placeholder' => 'Role Description ','required' =>'required']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('default_page','Default Page ',['class' => 'control-label col-lg-2']) !!}
        <div class="col-lg-10">
            {!! Form::text('default_page',null,['class' => 'form-control ','placeholder' => 'Default Page','required' =>'required']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('portal_id','Portal ',['class' => 'control-label col-lg-2']) !!}
        <div class="col-lg-10">
            {!! Form::select('portal_id',$portals, null,['id' => 'portal_id','class' => 'form-control '])!!}
        </div>
    </div>
</div>
<div class="panel-footer">
    <div class="text-right">
        <button type="submit" class="btn bg-teal-400 pull-right fix-width btn-md m-right-20" >
            <i class="{{$icon}}"></i>&nbsp;&nbsp;{{$textButton}}
        </button>
        <button type="reset" class="btn btn-default pull-right fix-width btn-md m-right-10" id="reset">
            <i class="icon-reload-alt position-right"></i> Reset
        </button>
    </div>
</div>

@section('costum-js')
    <script>
        $('#portal_id').select2({
            placeholder : 'pilih portal'
        });
    </script>
@stop