@extends('panel.layout.index')
@section('main')
    @push('panel_css')

    @endpush
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> الصفحة الرئيسية <span>  {{( $type == 'student') ? ' الطلاب' : 'المدرسين'}} /  تعديل حساب  </span>
        </h2>
    </div>
    <div class="contentpanel">
        <div class="row">
            {!! Form::open(['id'=>'form','method'=>'PUT','url'=>lang_route('panel.'.$type.'.edit',['user' => $user->id]),'to'=>lang_route('panel.'.$type.'.all')]) !!}
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div style="padding-bottom: 56px;padding-top: 56px" class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" style="text-align: center">الإسم الأول </label>
                            <div class="col-sm-8">
                                <input type="text" name="first_name" value="{{$user->first_name}}" class="form-control"
                                       required/>
                            </div>
                        </div>
                        <input type="hidden" name="type" value="{{( $type == 'student') ? ' 1' : '2'}}">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" style="text-align: center">الإسم الأخير</label>
                            <div class="col-sm-8">
                                <input type="text" name="last_name" value="{{$user->last_name}}" class="form-control"
                                       required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" style="text-align: center">البريد الإلكتروني </label>
                            <div class="col-sm-8">
                                <input type="email" name="email" value="{{$user->email}}" class="form-control"
                                       required/>
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
                                            <option value="{{$country->id}}"
                                                    @if($user->country_id == $country->id ) selected @endif>{{$country->name .'  ('.$country->name_en.')'}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <input type="hidden" name="id" value="{{$user->id}}">
                        <div class="form-group" style="margin-top: 50px">
                            <label class="col-sm-3 control-label" style="text-align: center;"> كلمة المرور </label>
                            <div class="col-sm-8">
                                <input id="password" type="password" name="password" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label" style="text-align: center"> تأكيد كلمة المرور </label>
                            <div class="col-sm-8">
                                <input type="password" name="password_confirmation" class="form-control">
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
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    @push('panel_js')
        {!! HTML::script('panel/js/select2.min.js') !!}
        {!! HTML::script('/front/js/jquery.validate.min.js') !!}
        {!! HTML::script('/front/js/validate-ar.js') !!}
        {!! HTML::script('/front/js/errors.js') !!}
        {!! HTML::script('Panel') !!}
        <script>
            jQuery(".select2").select2({
                width: '100%',
                direction: 'ltr'
            });
        </script>
    @endpush
@stop