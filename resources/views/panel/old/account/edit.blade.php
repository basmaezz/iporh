@extends('panel.layout.index')
@section('main')
    @push('panel_css')
        {!! HTML::style('panel/css/jasny-bootstrap.min.css') !!}
    @endpush
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> الصفحة الرئيسية <span>   حسابات الإدارة /  تعديل الحساب   </span></h2>
    </div>
    <div class="contentpanel">
        <div class="row">
            {!! Form::open(['id'=>'form','url'=>admin_url('account/edit/'.$admin->id),'to'=>admin_url('account/all')]) !!}
            <div class="col-md-8">
                <div class="panel panel-default">
                    <input type="hidden"  id="photo" name="photo" value="{{$admin->photo}}">
                    <input type="hidden"  name="admin_id" value="{{$admin->id}}">
                    <div style="padding-bottom: 79px;padding-top: 79px" class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" style="text-align: center">الإسم </label>
                            <div class="col-sm-8">
                                <input type="text" name="name" class="form-control" value="{{$admin->name}}" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" style="text-align: center">البريد الإلكتروني </label>
                            <div class="col-sm-8">
                                <input type="email" name="email" class="form-control" value="{{$admin->email}}" required/>
                            </div>
                        </div>


                        @php
                            $roles = get_all_roles();
                        @endphp
                        <div class="form-group">
                            <label class="col-sm-3 control-label" style="text-align: center"> مجموعة الصلاحيات </label>
                            <div class="col-sm-8">
                                <select class="select2" name="role" data-placeholder="الرجاء تحديد مجموعة الصلاحيات"
                                        required>
                                    <option></option>
                                    @if(isset($roles) && $roles->count() > 0)
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}" @if($admin->getRoleId() == $role->id ) selected @endif>{{$role->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group" style="margin-top: 50px">
                            <label class="col-sm-3 control-label" style="text-align: center;"> كلمة المرور  </label>
                            <div class="col-sm-8">
                                <input id="password" type="password" name="password" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label" style="text-align: center"> تأكيد كلمة المرور </label>
                            <div class="col-sm-8">
                                <input type="password" name="password_confirm" class="form-control">
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
                                         style="width: 200px; height: 200px;max-width:200px; max-height:200px">
                                        <img src="{{image_url($admin->photo,'300x300')}}" data-src="holder.js/100%x100%"
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
        {!! HTML::script('panel/js/select2.min.js') !!}
        {!! HTML::script('/front/js/jquery.validate.min.js') !!}
        {!! HTML::script('/front/js/validate-ar.js') !!}
        {!! HTML::script('/front/js/errors.js') !!}
        {!! HTML::script('panel/js/user_form.js') !!}
        {!! HTML::script('Panel') !!}
        {!! HTML::script('panel/js/jasny.js') !!}
        <script>
            jQuery(".select2").select2({
                width: '100%',
                direction: 'ltr'
            });
        </script>
    @endpush
@stop