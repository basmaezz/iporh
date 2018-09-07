@extends('panel.layout.index',['sub_title'=>'إنشاء حساب جديد'])
@section('main')
    @push('panel_css')

    @endpush
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> الصفحة الرئيسية <span>  {{( $type == 'student') ? ' الطلاب' : 'المدرسين'}} /  إنشاء حساب جديد  </span>
        </h2>
    </div>

    <div class="contentpanel">
        <div class="row">
            {!! Form::open(['id'=>'form','method'=>'POST','url'=>lang_route('panel.'.$type.'.create'),'to'=>lang_route('panel.'.$type.'.all')]) !!}
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div style="padding-bottom: 56px;padding-top: 56px" class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" style="text-align: center">الإسم الأول </label>
                            <div class="col-sm-8">
                                <input type="text" name="first_name" class="form-control" required/>
                            </div>
                        </div>
                        <input type="hidden" name="type" value="{{( $type == 'student') ? ' 1' : '2'}}">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" style="text-align: center">الإسم الأخير</label>
                            <div class="col-sm-8">
                                <input type="text" name="last_name" class="form-control" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" style="text-align: center">البريد الإلكتروني </label>
                            <div class="col-sm-8">
                                <input type="email" name="email" class="form-control" required/>
                            </div>
                        </div>

                        @php
                            $countries = get_all_countries();
                        @endphp
                        <div class="form-group">
                            <label class="col-sm-3 control-label" style="text-align: center"> الدولة </label>
                            <div class="col-sm-8">
                                <select class="select2" name="country_id" data-placeholder="الرجاء تحديد دولة"
                                        required>
                                    <option></option>
                                    @if(isset($countries) && $countries->count() > 0)
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}">{{$country->name .'  ('.$country->name_en.')'}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group" style="margin-top: 50px">
                            <label class="col-sm-3 control-label" style="text-align: center;"> كلمة المرور </label>
                            <div class="col-sm-8">
                                <input id="password" type="password" name="password" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label" style="text-align: center"> تأكيد كلمة المرور </label>
                            <div class="col-sm-8">
                                <input type="password" name="password_confirmation" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row btn-padding">
                            <button style="width: 80%" class=" btn btn-primary">إضافة&nbsp; &nbsp; <i
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

        {!! HTML::script('panel/js/select2.min.js') !!}
        {!! HTML::script('/front/js/jquery.validate.min.js') !!}
        {!! HTML::script('/front/js/validate-ar.js') !!}
        {!! HTML::script('/front/js/errors.js') !!}
        {!! HTML::script('panel/js/user_form.js') !!}
        <script>
            jQuery(".select2").select2({
                width: '100%',
                direction: 'ltr'
            });
        </script>
    @endpush
@stop