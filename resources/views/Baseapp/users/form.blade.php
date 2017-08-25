<div class="panel-body">
    {{--include notification--}}
    @include('flash::message')
    {{--end include notification--}}
    <div class="form-group">
        {!! Form::label('name','Name ',['class' => 'control-label col-lg-2']) !!}
        <div class="col-lg-10">
            {!! Form::text('name',null,['class' => 'form-control ' , 'placeholder' => 'Name','required' =>'required']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('username','Username ',['class' => 'control-label col-lg-2']) !!}
        <div class="col-lg-10">
            {!! Form::text('username',null,['class' => 'form-control ','placeholder' => 'Username','required' =>'required']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('email','Email ',['class' => 'control-label col-lg-2']) !!}
        <div class="col-lg-10">
            {!! Form::email('email',null,['class' => 'form-control ','placeholder' => 'Email','required' =>'required']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('role_id','Role ',['class' => 'control-label col-lg-2']) !!}
        <div class="col-lg-10">
            {!! Form::select('role_id',$roles, null,['id' => 'role_id','class' => 'form-control '])!!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('password','Password ',['class' => 'control-label col-lg-2']) !!}
        <div class="col-lg-10">
            <div class="label-indicator-absolute">
                {!! Form::password('password',['class' => 'form-control ','placeholder' => 'Password']) !!}
                <span class="label password-indicator-label-absolute"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('password_confirm','Confirmasion Password ',['class' => 'control-label col-lg-2']) !!}
        <div class="col-lg-10">
            {!! Form::password('password_confirm',['class' => 'form-control ','placeholder' => 'Confirmasion Password']) !!}
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
        $('#role_id').select2({
            placeholder : 'pilih role'
        });
    </script>
@stop