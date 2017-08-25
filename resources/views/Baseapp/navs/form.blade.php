<div class="panel-body">
    {{--include notification--}}
    @include('flash::message')
    {{--end include notification--}}
    {!! Form::hidden('portal_id', $portal->id) !!}
    <div class="form-group">
        {!! Form::label('parent_id','Parent ',['class' => 'control-label col-lg-2']) !!}
        <div class="col-lg-10">
            {!! Form::select('parent_id',$listParent, null,['id' => 'parent_id','class' => 'form-control to-select '])!!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('nav_title','Judul Menu ',['class' => 'control-label col-lg-2']) !!}
        <div class="col-lg-10">
            {!! Form::text('nav_title',null,['class' => 'form-control ' , 'placeholder' => 'Judul Menu','required' =>'required']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('nav_desc','Menu Descripton ',['class' => 'control-label col-lg-2']) !!}
        <div class="col-lg-10">
            {!! Form::textarea('nav_desc',null,['class' => 'form-control ','placeholder' => 'Menu Descripton']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('nav_url','Url Menu',['class' => 'control-label col-lg-2']) !!}
        <div class="col-lg-10">
            {!! Form::text('nav_url',null,['class' => 'form-control ','placeholder' => 'Url Menu','required' =>'required']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('nav_no','Urutan',['class' => 'control-label col-lg-2']) !!}
        <div class="col-lg-2">
            {!! Form::text('nav_no',null,['class' => 'form-control ','placeholder' => 'Urutan','required' =>'required']) !!}
        </div>
     </div>
    <div class="form-group">
        {!! Form::label('active_st','Gunakan ',['class' => 'control-label col-lg-2']) !!}
        <div class="col-lg-2">
            {!! Form::select('active_st', ['1' => 'Yes', '0' => 'No'], null,['id' => 'active_st','class' => 'form-control to-select'])!!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('display_st','Tampilkan ',['class' => 'control-label col-lg-2']) !!}
        <div class="col-lg-2">
            {!! Form::select('display_st', ['1' => 'Yes', '0' => 'No'], null,['id' => 'display_st','class' => 'form-control to-select'])!!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('nav_st','Status ',['class' => 'control-label col-lg-2']) !!}
        <div class="col-lg-2">
            {!! Form::select('nav_st', ['internal' => 'Internal', 'external' => 'external'], null,['id' => 'display_st','class' => 'form-control to-select'])!!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('nav_icon','Icon',['class' => 'control-label col-lg-2']) !!}
        <div class="col-lg-4">
            <div class="input-group">
                {!! Form::text('nav_icon',null,['class' => 'form-control icp icp-auto','placeholder' => 'Icon',  'data-placement' =>'bottomRight']) !!}
                <span class="input-group-addon"></span>
            </div>
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
        $('#parent_id').select2({
            placeholder : 'pilih Parent'
        });
        $('#nav_icon').iconpicker({
            placement: 'top',
            icons: $.merge([
                        'icon-home',
                        'glyphicon-home',
                        'glyphicon-repeat',
                        'glyphicon-search',
                        'glyphicon-arrow-left',
                        'glyphicon-arrow-right',
                        'glyphicon-star'],
                    $.iconpicker.defaultOptions.icons),
            fullClassFormatter: function(val){
                if(val.match(/^fa-/)){
                    return 'fa '+val;
                }else if(val.match(/^icon-/)){
                    return 'icon '+val;
                }else{
                    return 'glyphicon '+val;
                }
            }
        });
    </script>
@stop