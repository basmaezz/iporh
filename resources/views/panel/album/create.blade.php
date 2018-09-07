@php
    $breadcrumb_array = [];
    array_push($breadcrumb_array,collect(['is_last'=>true,'name'=>'إضافة ألبوم','link'=> '#']));
    array_push($breadcrumb_array,collect(['is_last'=>false,'name'=>'الألبومات','link'=> lang_route('panel.album.all')]));
@endphp

@extends('panel.layouts.index',['sub_title'=>'إضافة ألبوم جديد' ,'breadcrumb_array'=> $breadcrumb_array])
@section('main')
    @push('panel_css')
        {!! HTML::style('panel/css/jasny-bootstrap.min.css') !!}
        {!! HTML::style('panel/plugins/summernote/summernote-bs4.css') !!}
    @endpush

    <div class="content">
        {!! Form::open(['id'=>'form','method'=>'POST','url'=>lang_route('panel.album.create'),'to'=>lang_route('panel.album.all')]) !!}

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <fieldset class="form-group">
                            <label>العنوان</label>
                            <input class="form-control"  type="text" name="title" placeholder="الرجاء إدخال العنوان" required>
                        </fieldset>

                        <fieldset class="form-group">
                            <label>الوصف</label>
                            <textarea class="form-control " rows="4" type="text" name="description" placeholder="الرجاء إدخال الوصف" required></textarea>
                        </fieldset>

                        @php
                            $items = get_all_album_cats();
                        @endphp

                        <fieldset class="form-group">
                            <label>تصنيف الألبوم</label>
                            <select class="form-control" name="category_id" data-placeholder="إختيار التصنيف" required>
                                <option disabled selected hidden>إختيار التصنيف</option>
                                @if(isset($items) && $items->count() > 0)
                                    @foreach($items as $item)
                                        <option value="{{$item->id}}">{{get_text_locale($item,'text')}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </fieldset>


                        <label>رفع الصور</label>
                        <fieldset class="form-group">
                            <div id="app">
                                <dropzone :images_data="{{json_encode(collect([]))}}"></dropzone>
                            </div>
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