<div class="panel-body">
    {{--include notification--}}
    @include('flash::message')
    {{--end include notification--}}
    <div class="form-group">
        {!! Form::label('pref_group','Group ',['class' => 'control-label col-lg-2']) !!}
        <div class="col-lg-10">
            {!! Form::text('pref_group',null,['class' => 'form-control ' , 'placeholder' => 'Group','required' =>'required']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('pref_name','Nama ',['class' => 'control-label col-lg-2']) !!}
        <div class="col-lg-10">
            {!! Form::text('pref_name',null,['class' => 'form-control ','placeholder' => 'Nama','required' =>'required']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('pref_value','Value ',['class' => 'control-label col-lg-2']) !!}
        <div class="col-lg-10">
            {!! Form::text('pref_value',null,['class' => 'form-control ','placeholder' => 'Value','required' =>'required']) !!}
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