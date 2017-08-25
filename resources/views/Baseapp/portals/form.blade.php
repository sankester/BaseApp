<div class="panel-body">
    {{--include notification--}}
    @include('flash::message')
    {{--end include notification--}}
    <div class="form-group">
        {!! Form::label('portal_nm','Nama ',['class' => 'control-label col-lg-2']) !!}
        <div class="col-lg-10">
            {!! Form::text('portal_nm',null,['class' => 'form-control ' , 'placeholder' => 'Nama','required' =>'required']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('site_title','Site Title ',['class' => 'control-label col-lg-2']) !!}
        <div class="col-lg-10">
            {!! Form::text('site_title',null,['class' => 'form-control ','placeholder' => 'Site Title','required' =>'required']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('site_desc','Site Descripton ',['class' => 'control-label col-lg-2']) !!}
        <div class="col-lg-10">
            {!! Form::textarea('site_desc',null,['class' => 'form-control ','placeholder' => 'Site Descripton','required' =>'required']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('meta_desc','Meta Descripton ',['class' => 'control-label col-lg-2']) !!}
        <div class="col-lg-10">
            {!! Form::textarea('meta_desc',null,['class' => 'form-control ','placeholder' => 'Meta Descripton']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('meta_keyword','Meta Keyword ',['class' => 'control-label col-lg-2']) !!}
        <div class="col-lg-10">
            {!! Form::textarea('meta_keyword',null,['class' => 'form-control ','placeholder' => 'Meta Keyword']) !!}
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