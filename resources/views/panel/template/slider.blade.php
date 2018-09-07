@extends('panel.layouts.index')
@section('main')
    @push('panel_css')
        {!! HTML::style('panel/css/jasny-bootstrap.min.css') !!}
        {!! HTML::style('panel/css/jquery.tagsinput.css') !!}
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    @endpush

    <div class="pageheader">
        <h2><i class="fa fa-home"></i> Dashboard <span>   Templates / Home Page Slider </span></h2>
    </div>

    <div class="contentpanel">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="row">
                        <button style="margin-left: 30px;margin-top: 15px;" class="btn btn-success pull-left section"
                                data-toggle="modal"
                                data-type="2" data-target=".bs-example-modal-photo"><i
                                    class="glyphicon glyphicon-plus"></i>&nbsp;Add
                        </button>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            @php
                                $sliders = \App\Section::slider()->get();
                            @endphp
                            @foreach($sliders as $item)
                                <div class="panel panel-info">
                                    <div class="panel-heading"
                                         style="background-color: #eeeeee!important;border-radius: 5px;color: red!important;">
                                        <div class="panel-btns pull-right">
                                            <div class="row">
                                                <button title="Edit" style="width: 100%;" data-toggle="modal"
                                                        data-id="{{$item->id}}" data-type="2"
                                                        data-target=".bs-example-modal-photo"
                                                        class="btn btn-sm btn-success section"><i
                                                            style="margin-right: 5px"
                                                            class="fa fa-check-square-o"></i>Edit
                                                </button>
                                            </div>
                                            <div class="row" style="margin-top: 10px">
                                                <button data-toggle="reject" title="Delete"
                                                        data-url="{{lang_route('panel.about.section.delete',[$item->id])}}"
                                                        style="width: 100%;background-color: #FA2A00"
                                                        class="btn btn-sm btn-danger delete"><i
                                                            class="glyphicon glyphicon-remove"></i> Delete
                                                </button>
                                            </div>

                                        </div><!-- panel-btns -->
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <img style="max-height: 250px;max-width: 250px"
                                                         src="{{image_url($item->image)}}">
                                                    @if(isset($item->btn_link))
                                                        <h4 class="text-left" style="color: #ff6b04;font-size: 15px;">
                                                            Button Text : <span
                                                                    style="color: #0b0b0b"> {{$item->btn_txt  }} </span>
                                                        </h4>
                                                        <h4 class="text-left" style="color: #ff6b04;font-size: 15px;">
                                                            Button Text (Arabic) : <span
                                                                    style="color: #0b0b0b"> {{$item->btn_txt_ar  }} </span>
                                                        </h4>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <h3 style="color: #179be8"
                                                    class="panel-title">{{$item->title}}</h3>
                                                <p style="color: #2a2323!important;">{!! strip_tags($item->text) !!}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <h3 style="color: #179be8;text-align: right"
                                                    class="panel-title">{{$item->title_ar}}</h3>
                                                <p style="color: #2a2323!important;text-align: right;">{!! strip_tags($item->text_ar) !!}</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="template_modal" class="modal fade bs-example-modal-photo " tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-photo-viewer">
            {!! Form::open(['id'=>'template_form','data-url'=>admin_url('template/about/section')]) !!}
            <div style="height: auto" class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                    <h4 class="modal-title">Home Page Slider</h4>
                </div>
                <div class="modal-body">
                    <div id="loader" class="col-md-offset-6 hidden">
                        <img src="/panel/images/loaders/loader10.gif" alt="">
                    </div>

                    <div id="modal_body" class="row">
                        <input type="hidden" name="image" id="photo">
                        <input type="hidden" name="id" id="id">
                        <ul class="nav nav-tabs nav-justified">
                            <li class="active"><a href="#profile3" data-toggle="tab"><strong>English</strong></a></li>
                            <li><a href="#home3" data-toggle="tab"><strong>Arabic</strong></a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="profile3">
                                <div style="margin-top: 30px" class="row">

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align: center">Title </label>
                                        <div class="col-sm-9">
                                            <input type="text" id="title" class="form-control" name="title" required/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align: center">Text </label>
                                        <div class="col-sm-9">
                                            <textarea id="text" name="text"  rows="7"
                                                      class="form-control" required></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align: center">Button
                                            Text </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="btn_txt" name="btn_txt"/>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane " id="home3">
                                <div style="margin-top: 30px" class="row">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align: center">Title
                                            (Arabic) </label>
                                        <div class="col-sm-9">
                                            <input type="text" id="title_ar" class="form-control" name="title_ar"
                                                   required/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align: center">Text
                                            (Arabic)</label>
                                        <div class="col-sm-9">
                                            <textarea id="text_ar" name="text_ar" rows="7"
                                                      class="form-control" required></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align: center">Button Text (Arabic) </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="btn_txt_ar" name="btn_txt_ar"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div  class="tab-content">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align: center">Button Link </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="btn_link" name="btn_link" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align: center">Transtion Type</label>
                                <div class="col-sm-9">
                                    <select class="select2" id="transtion" name="transtion" data-placeholder="Select Transtion Type" required>
                                        <option></option>
                                        <option value="1">Center</option>
                                        <option value="2">Left</option>
                                        <option value="3">Right</option>
                                    </select>
                                </div>
                            </div>
                            <div id="photo_form" class="form-group">
                                <label class="col-sm-3 control-label" style="text-align: center">Upload Image </label>

                                <div class="row col-sm-9">
                                    <form id="single" action="{{csrf_token()}}">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <span class="sr-only">Loading...</span>
                                            <div id="jasny_progress" class="progress hidden">
                                                <div id="jasny_percent"
                                                     class="progress-bar progress-bar-striped active"
                                                     role="progressbar"
                                                     aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                                     style="width:40%;background-color: #11a724">0%
                                                </div>
                                            </div>
                                            <div class="fileinput-new thumbnail"
                                                 style="width: 300px; height: 300px">
                                                <img id="jasny_photo" src="{{ image_url('default.png')}}"
                                                     data-src="holder.js/100%x100%"
                                                     alt="">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"
                                                 style="max-width: 300px; max-height: 300px;"></div>
                                            <div>
                                                <span class="btn btn-default btn-file"><span class="fileinput-new">Select Image</span>
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
                </div>
                <div class="modal-footer">
                    <div class="row btn-padding">
                        <button style="width: 15%" class="btn btn-success pull-right"> Save &nbsp; &nbsp; <i
                                    style="top: inherit;left: AUTO;"
                                    class="upload-spinn fa fa-cog fa-spin fa-1x fa-fw  hidden"></i></button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}

        </div>
    </div>



    @push('panel_js')
        {!! HTML::script('/panel/js/jquery.validate.min.js') !!}
        {!! HTML::script('/panel/js/errors.js') !!}
        {!! HTML::script('panel/js/jasny-bootstrap.min.js') !!}
        {!! HTML::script('panel/js/jasny.js') !!}
        {!! HTML::script('panel/js/slider.js') !!}
        {!! HTML::script('panel/js/simple_form.js') !!}
        <script>
            jQuery(".select2").select2({
                width: '100%',
            });
        </script>
    @endpush
@stop