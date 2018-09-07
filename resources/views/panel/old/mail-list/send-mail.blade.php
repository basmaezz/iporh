@extends('panel.layout.index')
@section('main')
    @push('panel_css')




    @endpush

    <div class="pageheader">
        <h2><i class="fa fa-home"></i> الصفحة الرئيسية <span>  القائمة البريدية  /   إرسال بريد إلكتروني   </span></h2>
    </div>


    <div class="contentpanel">
        <div class="row">

            {!! Form::open(['id'=>'form','url'=>lang_route('panel.mail.send'),'to'=>lang_route('panel.mail.index')]) !!}

            <div class="col-md-8">
                <div class="panel panel-default">

                    <div style="margin-top:30px;width: 70%;display: none"
                         class="alert alert-danger errors col-md-offset-2">
                    </div>
                    <div class="panel-body">

                        <div class="form-group">
                            <label class="control-label" style="text-align: center">عنوان الرسالة :</label>
                            <input type="text" name="title" class="form-control" placeholder="عنوان الرسالة" required/>
                        </div>


                        <div class="form-group">
                            <label class=" col-sm-3 control-label">الموضوع :</label>
                            <div class="row">
                                <div class="col-md-12" style="margin-top: 10px;">
                                    <textarea class="form-control ckeditor" rows="15" name="msg"
                                              style="text-align: left!important;" required></textarea>
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
                            <button style="width: 80%" class=" btn btn-primary">إرسال &nbsp; &nbsp; <i
                                        style="top: inherit;left: AUTO;"
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
        {!! HTML::script('Panel') !!}
        {!! HTML::script('panel/js/ckeditor/ckeditor.js') !!}
        {!! HTML::script('panel/js/ckeditor/adapters/jquery.js') !!}
        {!! HTML::script('panel/js/ckeditor.js') !!}
        {!! HTML::script('panel/js/page_form.js') !!}}
    @endpush
@stop