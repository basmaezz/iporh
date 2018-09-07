@extends('panel.layout.index')
@section('main')
    @push('panel_css')
        {!! HTML::style('panel/css/jasny-bootstrap.min.css') !!}
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    @endpush

    <div class="pageheader">
        <h2><i class="fa fa-home"></i> الصفحة الرئيسية
            <span>   إعدادات القوالب / إعدادات صفحة الدورات  </span></h2>
    </div>


    @php
        $constant = new \App\Constant();
    @endphp


    <div class="contentpanel">
        <div class="row">
            {!! Form::open(['id'=>'form','url'=> admin_url('template/course') , 'to'=>admin_url('template/course')]) !!}
            <input type="hidden" id="photo" name="course_pic" value="{{$constant->valueOf('course_pic')}}">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-body" style="padding-top: 53px;padding-bottom: 54px;">

                        <div class="form-group">
                            <label class="col-sm-3 control-label" style="text-align: center"> العنوان
                                :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="course_title"
                                       value="{{$constant->valueOf('course_title')}}" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" style="text-align: center">الوصف
                                :</label>
                            <div class="col-sm-8">
                                            <textarea class="form-control" rows="6" name="course_description"
                                                      required>{!! $constant->valueOf('course_description') !!}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label" style="text-align: center">الرابط
                                :</label>
                            <div class="col-sm-8">
                                <input type="url" name="course_url" class="form-control"
                                       value="{{$constant->valueOf('course_url')}}" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="toggle" class="col-sm-3 control-label" style="text-align: center">إعداد الظهور
                                :</label>
                            <div class="col-sm-8">
                                <input id="toggle" type="checkbox" name="course_is_allowed" value="on" @if($constant->valueOf('course_is_allowed') == 'on') checked @endif data-toggle="toggle" data-onstyle="success">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row btn-padding">
                            <button style="width: 80%" class=" btn btn-primary">تعديل&nbsp; &nbsp; <i
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
                                         style="width: 200px; height: 150px;max-width:200px; max-height:150px">
                                        <img src="{{ image_url($constant->valueOf('course_pic'),'350x300')}}"
                                             data-src="holder.js/100%x100%"
                                             alt="">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"
                                         style="max-width: 200px; max-height: 200px;"></div>
                                    <div>
                                                <span class="btn btn-default btn-file"><span class="fileinput-new">إختيار صورة</span>
                                                    <span class="fileinput-exists">تغيير الصورة</span>
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
        {!! HTML::script('/front/js/jquery.validate.min.js') !!}
        {!! HTML::script('/front/js/validate-ar.js') !!}
        {!! HTML::script('/front/js/errors.js') !!}
        {!! HTML::script('Panel') !!}
        {!! HTML::script('panel/js/jasny.js') !!}
        {!! HTML::script('panel/js/ckeditor/ckeditor.js') !!}
        {!! HTML::script('panel/js/ckeditor/adapters/jquery.js') !!}
        {!! HTML::script('panel/js/ckeditor.js') !!}
        {!! HTML::script('panel/js/page_form.js') !!}
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    @endpush
@stop