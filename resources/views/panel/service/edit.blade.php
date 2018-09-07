@php
    $breadcrumb_array = [];
    array_push($breadcrumb_array,collect(['is_last'=>true,'name'=>$service->title,'link'=> '#']));
    array_push($breadcrumb_array,collect(['is_last'=>false,'name'=>'الخدمات','link'=> lang_route('panel.service.all')]));
@endphp

@extends('panel.layouts.index',['sub_title'=>'تعديل الخدمة' ,'breadcrumb_array'=> $breadcrumb_array])
@section('main')
    @push('panel_css')
        {!! HTML::style('panel/css/jasny-bootstrap.min.css') !!}
        {!! HTML::style('panel/plugins/summernote/summernote-bs4.css') !!}
    @endpush

    <div class="content">
        {!! Form::open(['id'=>'form','method'=>'PUT','url'=>lang_route('panel.service.edit',['id'=>$service->id]),'to'=>lang_route('panel.service.all')]) !!}

        <div class="row">
            <div class="col-md-8">
                <input type="hidden" id="photo" name="image" value="{{$service->image}}">
                <div class="card">
                    <div class="card-body">
                        <fieldset class="form-group">
                            <label>العنوان</label>
                            <input class="form-control"  type="text" name="title" placeholder="الرجاء إدخال العنوان"  value="{{$service->title}}" required>
                        </fieldset>

                        <label >المحتوى</label>
                        <fieldset class="form-group">
                            <textarea  id="summernote" name="text" rows="10">
                                {!! $service->text !!}
                            </textarea>
                        </fieldset>


                        <fieldset class="form-group">
                            <label>رابط الفيديو</label>
                            <input class="form-control"  type="url" name="video" value="{{$service->video}}" placeholder="الرجاء إدخال رابط الفيديو" >
                        </fieldset>


                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="margin-bottom: 30px">
                    <div class="card-body">
                        <div class="row btn_padding">
                            <button style="width: 90%" class=" btn btn-primary">حفظ&nbsp; &nbsp;
                                <i style="top: inherit;left: AUTO;" class="upload-spinn fa fa-cog fa-spin fa-1x fa-fw  hidden"></i></button>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="col-sm-12 jasny-padding">
                            <form id="single" action="{{csrf_token()}}">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div id="jasny_progress" class="progress hidden">
                                        <div id="jasny_percent" class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: 25%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="fileinput-new thumbnail"
                                         style="width: 300px; height: 300px;max-width:300px; max-height:300px">
                                        <img src="{{image_url($service->image,'300x300')}}"
                                             data-src="holder.js/100%x100%"
                                             alt="">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"
                                         style="max-width: 300px; max-height: 300px;"></div>
                                    <div>
                                        <span class="btn btn-default btn-file" style="width: 100%">
                                            <span class="fileinput-new">إختيار صورة</span>
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
        </div>
        {!! Form::close() !!}

    </div>
    @push('top_js')
        {!! HTML::script(asset('/js/app.js')) !!}
    @endpush

    @push('panel_js')

        {!! HTML::script('panel/js/jasny-bootstrap.min.js') !!}
        {!! HTML::script('panel/js/jasny.js') !!}
        {!! HTML::script('panel/plugins/summernote/summernote-bs4.js') !!}
        {!! HTML::script('/panel/js/post.js') !!}

    @endpush
@stop