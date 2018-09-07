@extends('panel.layout.index',['sub_title'=>'تعديل صفحات الموقع'])
@section('main')
    @push('panel_css')
        {!! HTML::style('panel/css/jasny-bootstrap.min.css') !!}
    @endpush

    <div class="pageheader">
        <h2><i class="fa fa-home"></i> الصفحة الرئيسية <span>  إعدادات الموقع /   تعديل صفحات الموقع   </span></h2>
    </div>


    <div class="contentpanel">
        <div class="row">
            {!! Form::open(['id'=>'form','method'=>'PUT','url'=> lang_route('panel.page.edit',['type'=>$page->type]) , 'to'=> lang_route('panel.page.edit',['type'=>$page->type])]) !!}
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="nav nav-tabs nav-justified">
                            <li class="active"><a href="#home3" data-toggle="tab"><strong>اللغة العربية</strong></a>
                            </li>
                            <li><a href="#profile3" data-toggle="tab"><strong>اللغة الإنجليزية</strong></a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="home3">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">عنوان الصفحة :</label>
                                        <div class="row">
                                            <div class="col-md-12" style="margin-top: 10px;">
                                                <input type="text" name="title" class="form-control"
                                                       value="{{$page->title}}"
                                                       required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class=" col-sm-3 control-label">محتوى الصفحة :</label>
                                        <div class="row">
                                            <div class="col-md-12" style="margin-top: 10px;">
                                                <textarea class="form-control ckeditor" rows="15" name="text"
                                                          required>{!! $page->text !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="profile3">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">عنوان الصفحة :</label>
                                        <div class="row">
                                            <div class="col-md-12" style="margin-top: 10px;">
                                                <input type="text" name="title_en" class="form-control"
                                                       value="{{$page->title_en}}" style="text-align: left!important;"
                                                       required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class=" col-sm-3 control-label">محتوى الصفحة :</label>
                                        <div class="row">
                                            <div class="col-md-12" style="margin-top: 10px;">
                                    <textarea class="form-control ckeditor" rows="15" name="text_en" style="text-align: left!important;"
                                              required>{!! $page->text_en !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
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
                            <button style="width: 80%" class=" btn btn-primary">تعديل&nbsp; &nbsp; <i style="top: inherit;left: AUTO;"
                                        class="upload-spinn fa fa-cog fa-spin fa-1x fa-fw  hidden"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}

        </div>
    </div>



    @push('panel_js')
        {!! HTML::script('/front/js/jquery.validate.min.js') !!}
        {!! HTML::script('/front/js/validate-ar.js') !!}
        {!! HTML::script('/front/js/errors.js') !!}
        {!! HTML::script('panel/js/jasny-bootstrap.min.js') !!}
        {!! HTML::script('panel/js/jasny.js') !!}
        {!! HTML::script('panel/js/ckeditor/ckeditor.js') !!}
        {!! HTML::script('panel/js/ckeditor/adapters/jquery.js') !!}
        {!! HTML::script('panel/js/ckeditor.js') !!}
        {!! HTML::script('panel/js/page_form.js') !!}
    @endpush
@stop