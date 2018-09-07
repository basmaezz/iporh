@extends('panel.layouts.index')
@section('main')
    @push('panel_css')

    @endpush

    <div class="pageheader">
        <h2><i class="fa fa-home"></i> Dashboard <span>   Template Settings / Social Media Accounts /Edit </span></h2>
    </div>


    <div class="contentpanel">
        <div class="row">
            {!! Form::open(['id'=>'form','method'=>'PUT','url'=> lang_route('panel.settings.socials') , 'to'=> lang_route('panel.settings.socials')]) !!}
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @php
                            $socials = get_socials();
                        @endphp
                        @foreach($socials as $social)
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align: center">  {{$social->name}}</label>
                                <div class="col-sm-8">
                                    <input type="url" name="{{$social->key}}" placeholder="{{$social->name}}" @if(isset($social->item)) value="{{$social->item->link}}" @endif class="form-control"/>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row btn-padding">
                            <button style="width: 80%" class=" btn btn-primary">Edit&nbsp; &nbsp; <i style="top: inherit;left: AUTO;" class="upload-spinn fa fa-cog fa-spin fa-1x fa-fw  hidden"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}

        </div>
    </div>



    @push('panel_js')
        {!! HTML::script('/panel/js/jquery.validate.min.js') !!}
        {!! HTML::script('/panel/js/errors.js') !!}
        {!! HTML::script('Panel') !!}
    @endpush
@stop