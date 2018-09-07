@extends('panel.layouts.index',['sub_title'=>'Create Story'])
@section('main')
    @push('panel_css')
        {!! HTML::style('panel/css/jasny-bootstrap.min.css') !!}
    @endpush
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> Dashboard <span> Stories / Create </span></h2>
    </div>

    <div class="contentpanel">
        <div class="row">
            {!! Form::open(['id'=>'form','method'=>'POST','url'=>lang_route('panel.story.create'),'to'=>lang_route('panel.story.all')]) !!}
            <div class="col-md-8">
                <input type="hidden" id="photo" name="image">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="nav nav-tabs nav-justified">
                            <li class="active"><a href="#home3" data-toggle="tab"><strong>English</strong></a>
                            </li>
                            <li><a href="#profile3" data-toggle="tab"><strong>Arabic</strong></a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="home3">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" >Title </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="title" class="form-control" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" >Description </label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" rows="5" name="description" required></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class=" col-sm-3 control-label">Content</label>
                                        <div class="row">
                                            <div class="col-md-12" style="margin-top: 10px;">
                                                <textarea class="form-control ckeditor" rows="15" name="text" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="profile3">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" >Title </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="title_ar" class="form-control" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" >Description </label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" rows="5" name="description_ar" required></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class=" col-sm-3 control-label">Content</label>
                                        <div class="row">
                                            <div class="col-md-12" style="margin-top: 10px;">
                                                <textarea class="form-control ckeditor" rows="15" name="text_ar" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="margin-top: 10%;" >
                            <label class="col-sm-2 control-label" >Youtube Link </label>
                            <div class="col-sm-9">
                                <input type="text" name="video" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group" style="margin-top: 5%;">
                            <label class="control-label " style="text-align: center">Upload Images</label>
                            <div  id="app" >
                                <dropzone :images_data="{{json_encode([])}}"> </dropzone>
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
                                        <img src="{{image_url('default.png','300x300')}}" data-src="holder.js/100%x100%"
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
            {!! Form::close() !!}
        </div>
    </div>
    @push('top_js')
        {!! HTML::script(asset('/js/app.js')) !!}
    @endpush

    @push('panel_js')

        <script>
            jQuery(".select2").select2({
                width: '100%',
            });
        </script>
        {!! HTML::script('panel/js/jasny-bootstrap.min.js') !!}
        {!! HTML::script('panel/js/jasny.js') !!}
        {!! HTML::script('/panel/js/jquery.validate.min.js') !!}
        {!! HTML::script('panel/js/ckeditor/ckeditor.js') !!}
        {!! HTML::script('panel/js/ckeditor/adapters/jquery.js') !!}
        {!! HTML::script('panel/js/ckeditor.js') !!}
        {!! HTML::script('/panel/js/errors.js') !!}
        {!! HTML::script('/panel/js/post.js') !!}


    @endpush
@stop