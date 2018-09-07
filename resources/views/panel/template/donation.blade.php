@extends('panel.layouts.index')
@section('main')
    @push('panel_css')
        {!! HTML::style('panel/css/jasny-bootstrap.min.css') !!}
        {!! HTML::style('panel/css/jquery.tagsinput.css') !!}
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    @endpush

    <div class="pageheader">
        <h2><i class="fa fa-home"></i> Dashboard <span>   Templates / Donation </span></h2>
    </div>


    {!! Form::open(['id'=>'form','method' =>'POST','url'=> lang_route('panel.about.section.edit',[$section->id]) , 'to'=> lang_route('panel.template.donation')]) !!}
    <div class="contentpanel">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">


                            <input type="hidden" name="image" id="photo" value="{{$section->image}}">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align: center">Title</label>
                                <div class="col-sm-9">
                                    <input type="text" name="title" placeholder="Enter Title" value="{{$section->title}}" class="form-control" required/>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align: center"> Title (Arabic) </label>
                                <div class="col-sm-9">
                                    <input type="text" style="float: right" name="title_ar" placeholder="Enter Title  (Arabic)" value="{{$section->title_ar}}" class="form-control" required/>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align: center"> Text</label>
                                <div class="col-sm-9">
                                            <textarea class="form-control" rows="6" name="text"
                                                      required>{{$section->text}}</textarea>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align: center"> Text (Arabic) </label>
                                <div class="col-sm-9">
                                            <textarea class="form-control" style="float: right" rows="6" name="text_ar"
                                                      required>{{$section->text_ar}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align: center">Button Text</label>
                                <div class="col-sm-9">
                                    <input type="text" name="btn_txt" placeholder="Enter Button Text" value="{{$section->btn_txt}}" class="form-control" required/>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align: center">Button Text (Arabic)</label>
                                <div class="col-sm-9">
                                    <input type="text" name="btn_txt_ar" placeholder="Enter Button Text (Arabic)" value="{{$section->btn_txt_ar}}" class="form-control" required/>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align: center"> Button Link</label>
                                <div class="col-sm-9">
                                    <input type="text" style="float: right" name="btn_link" placeholder="Button Link" value="{{$section->btn_link}}" class="form-control" required/>
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
                                         style="width: 300px; height: 300px;max-width:300px; max-height:300px">
                                        <img src="{{image_url($section->image,'300x300')}}" data-src="holder.js/100%x100%"
                                             alt="">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"
                                         style="max-width: 300px; max-height: 300px;"></div>
                                    <div>
                                        <span class="btn btn-default btn-file" style="width: 100%">
                                            <span class="fileinput-new">Select Photo</span>
                                            <span class="fileinput-exists">Change Photo</span>
                                            <input type="file" class="fileupload">
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}


    @push('panel_js')
        {!! HTML::script('/panel/js/jquery.validate.min.js') !!}
        {!! HTML::script('/panel/js/errors.js') !!}
        {!! HTML::script('panel/js/jasny-bootstrap.min.js') !!}
        {!! HTML::script('panel/js/jasny.js') !!}
        {!! HTML::script('panel/js/simple_form.js') !!}

    @endpush
@stop