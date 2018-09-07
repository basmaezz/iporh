@extends('panel.layouts.index')
@section('main')
    @push('panel_css')
        {!! HTML::style('panel/css/jasny-bootstrap.min.css') !!}
        {!! HTML::style('panel/css/jquery.tagsinput.css') !!}
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    @endpush

    <div class="pageheader">
        <h2><i class="fa fa-home"></i> Dashboard <span>   Template Settings / Website Settings </span></h2>
    </div>


    @php
        $constant = new \App\Setting();
    @endphp


    <div class="contentpanel">
        <div class="row">
            {!! Form::open(['id'=>'form','method' =>'PUT','url'=> lang_route('panel.settings.website') , 'to'=> lang_route('panel.settings.website')]) !!}
            <input type="hidden" id="photo" name="logo" value="{{$constant->valueOf('logo')}}">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="nav nav-tabs nav-justified">
                            <li class="active"><a href="#home3" data-toggle="tab"><strong>English</strong></a></li>
                            <li><a href="#profile3" data-toggle="tab"><strong>Arabic</strong></a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="home3">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align: center">Title </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="title"
                                                   value="{{$constant->valueOf('title')}}" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align: center">Description </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" rows="6" name="description"
                                                      required>{!! $constant->valueOf('description') !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align: center">Tags </label>
                                        <div class="col-sm-8">
                                            <input name="tags" id="tags" class="form-control" required
                                                   value="{{$constant->valueOf('tags')}}"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align: center">Copyright Text </label>
                                        <div class="col-sm-8">
                                            <input type="text" name="copyright" class="form-control"
                                                   value="{{$constant->valueOf('copyright')}}" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="profile3">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align: center">Title (Arabic) </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="title_ar"
                                                   value="{{$constant->valueOf('title_ar')}}" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align: center">Description  (Arabic) </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" rows="6" name="description_ar"
                                                      required>{!! $constant->valueOf('description_ar') !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align: center">Tags  (Arabic) </label>
                                        <div class="col-sm-8">
                                            <input name="tags_ar" id="tags_ar" class="form-control" required
                                                   value="{{$constant->valueOf('tags_ar')}}"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align: center">Copyright Text  (Arabic)</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="copyright_ar" class="form-control"
                                                   value="{{$constant->valueOf('copyright_ar')}}" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group" style="margin-top:30px">
                                <label class="col-sm-3 control-label" style="text-align: center"> Address </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="address"
                                           value="{{$constant->valueOf('address')}}" required/>
                                </div>
                            </div>
                            <div class="form-group" style="margin-top:30px">
                                <label class="col-sm-3 control-label" style="text-align: center"> Phone </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="phone"
                                           value="{{$constant->valueOf('phone')}}" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align: center">Email
                                    :</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="email"
                                           value="{{$constant->valueOf('email')}}" required/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row btn-padding">
                            <button style="width: 80%" class=" btn btn-primary">Save&nbsp; &nbsp; <i
                                        style="top: inherit;left: AUTO;"
                                        class="upload-spinn fa fa-cog fa-spin fa-1x fa-fw  hidden"></i></button>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Logo</h4>
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-12 jasny-padding">
                            <form id="single" action="{{csrf_token()}}">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <span class="sr-only">Loading...</span>
                                    <div id="jasny_progress" class="progress hidden">
                                        <div id="jasny_percent" class="progress-bar progress-bar-striped active"
                                             role="progressbar"
                                             aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                             style="width:40%;background-color: #11a724">0%
                                        </div>
                                    </div>
                                    <div class="fileinput-new thumbnail"
                                         style="width: 200px; height: 150px;max-width:200px; max-height:150px">
                                        <img src="{{ image_url($constant->valueOf('logo'),'500x120')}}"
                                             data-src="holder.js/100%x100%"
                                             alt="">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"
                                         style="max-width: 200px; max-height: 200px;"></div>
                                    <div>
                                                <span class="btn btn-default btn-file"><span class="fileinput-new">Select Logo</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" class="fileupload">
                                                </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}

        </div>
    </div>



    @push('panel_js')
        {!! HTML::script('/panel/js/errors.js') !!}
        {!! HTML::script('panel/js/jasny-bootstrap.min.js') !!}
        {!! HTML::script('panel/js/jasny.js') !!}
        {!! HTML::script('panel/js/simple_form.js') !!}
        {!! HTML::script('panel/js/jquery.tagsinput.min.js') !!}
        <script>
            jQuery('#tags').tagsInput({width: 'auto'});
            jQuery('#tags_ar').tagsInput({width: 'auto'});
        </script>
    @endpush
@stop