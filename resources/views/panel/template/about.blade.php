@extends('panel.layouts.index')
@section('main')
    @push('panel_css')
        {!! HTML::style('panel/css/jasny-bootstrap.min.css') !!}
        {!! HTML::style('panel/css/jquery.tagsinput.css') !!}
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    @endpush

    <div class="pageheader">
        <h2><i class="fa fa-home"></i> Dashboard <span>   Templates / About Us (Who We Are) </span></h2>
    </div>

    @php
        $constant = new \App\Setting();
    @endphp


    <div class="contentpanel">
        <div class="row">
            <div class="col-md-12">

                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#profile3" data-toggle="tab"><strong>Texts</strong></a>
                    </li>
                    <li><a href="#home3" data-toggle="tab"><strong>Sections</strong></a></li>
                </ul>

                @php
                    $constant = new \App\Setting();
                @endphp
                <div class="tab-content">
                    <div class="tab-pane active" id="profile3">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    {!! Form::open(['id'=>'form','method' =>'PUT','url'=> lang_route('panel.settings.website') , 'to'=> lang_route('panel.template.about')]) !!}


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align: center">About Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="about_title" placeholder="Enter Title" value="{{$constant->valueOf('about_title')}}" class="form-control" required/>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align: center">About Title (Arabic) </label>
                                        <div class="col-sm-9">
                                            <input type="text" style="float: right" name="about_title_ar" placeholder="Enter Title  (Arabic)" value="{{$constant->valueOf('about_title_ar')}}" class="form-control" required/>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align: center">About Text</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" rows="6" name="about_txt"
                                                      required>{!! $constant->valueOf('about_txt') !!}</textarea>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align: center">About Text (Arabic) </label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" style="float: right" rows="6" name="about_txt_ar"
                                                      required>{!! $constant->valueOf('about_txt_ar') !!}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align: center"></label>
                                        <div class="col-sm-9">
                                            <button style="width: 40%" class=" btn btn-success">Save&nbsp; &nbsp; <i
                                                        style="top: inherit;left: AUTO;"
                                                        class="upload-spinn fa fa-cog fa-spin fa-1x fa-fw  hidden"></i></button>
                                        </div>
                                    </div>

                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane " id="home3">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    @php
                                        $sliders = \App\Section::about()->take(3)->get();
                                    @endphp
                                    @foreach($sliders as $item)
                                        <div class="panel panel-info">
                                            <div class="panel-heading" style="background-color: #eeeeee!important;border-radius: 5px;color: red!important;">
                                                <div class="panel-btns pull-right">
                                                    <button title="Edit" style="margin-right: 10px" data-toggle="modal"
                                                            data-id="{{$item->id}}" data-type="2"
                                                            data-target=".bs-example-modal-photo"
                                                            class="btn btn-sm btn-success section"><i
                                                                style="margin-right: 5px"
                                                                class="fa fa-check-square-o"></i>Edit
                                                    </button>
                                                </div><!-- Panel-btns -->
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="row">
                                                            <h4 class="text-center"> {{ get_about_info($item->transtion,false) }}</h4>
                                                            <img style="max-height: 250px;max-width: 250px" src="{{image_url($item->image)}}">
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
                    <h4 class="modal-title">About Us Template </h4>
                </div>
                <div class="modal-body">
                    <div id="loader" class="col-md-offset-6 hidden">
                        <img src="/panel/images/loaders/loader10.gif" alt="">
                    </div>

                    <div id="modal_body" class="row">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="image" id="photo">
                        <div class="col-md-9 col-md-offset-2">
                            <div class="form-group">
                                <label class="control-label" style="text-align: center">Title</label>
                                <input type="text" id="title" name="title" placeholder="Enter Title "
                                       class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" style="text-align: center">Text</label>
                                <textarea id="text" name="text" placeholder="Type Text Here " rows="7" class="form-control"
                                          required></textarea>
                            </div>

                            <div class="form-group">
                                <label class="control-label" style="text-align: center">Title (Arabic)</label>
                                <input type="text" id="title_ar" name="title_ar" placeholder="Enter Title (Arabic) "
                                       class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" style="text-align: center">Text (Arabic)</label>
                                <textarea id="text_ar" name="text_ar" placeholder="Type Text (Arabic) Here " rows="7" class="form-control"
                                          required></textarea>
                            </div>

                            <div id="photo_form" class="form-group">
                                <label class="control-label" style="text-align: center">Upload Image </label>
                                <div class="row">
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
        {!! HTML::script('Panel') !!}
        {!! HTML::script('panel/js/jasny.js') !!}
        {!! HTML::script('panel/js/about.js') !!}
        {!! HTML::script('panel/js/simple_form.js') !!}

    @endpush
@stop