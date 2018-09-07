@extends('panel.layouts.index',['sub_title'=>'Create Album'])
@section('main')
    @push('panel_css')

    @endpush
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> Dashboard <span>Photo Albums / Edit </span></h2>
    </div>

    <div class="contentpanel">
        <div class="row">
            {!! Form::open(['id'=>'form','method'=>'PUT','url'=>lang_route('panel.album.edit',['id'=>$album->id]),'to'=>lang_route('panel.album.all')]) !!}
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div style="padding-bottom: 56px;padding-top: 56px" class="panel-body">

                        @php
                            $items = get_all_album_cats();
                        @endphp
                        <div class="form-group">
                            <label class="col-sm-3 control-label" style="text-align: center"> Album Category </label>
                            <div class="col-sm-8">
                                <select class="select2" name="category_id" data-placeholder="Select Album Category"
                                        required>
                                    <option></option>
                                    @if(isset($items) && $items->count() > 0)
                                        @foreach($items as $item)
                                            <option value="{{$item->id}}" @if($item->id == $album->category_id) selected @endif>{{get_text_locale($item,'text')}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label" style="text-align: center">Title </label>
                            <div class="col-sm-8">
                                <input type="text" name="title" value="{{$album->title}}" class="form-control" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label" style="text-align: center">Description</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" rows="5" name="description"  required>{{$album->description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label" style="text-align: center">Title (Arabic)</label>
                            <div class="col-sm-8">
                                <input type="text" name="title_ar"  value="{{$album->title_ar}}"  class="form-control" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label" style="text-align: center">Description (Arabic)</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" rows="5" name="description_ar" required>{{$album->description_ar}}</textarea>
                            </div>
                        </div>

                        <div class="form-group" style="margin-top: 10%;">
                            <label class="control-label col-md-offset-1" style="text-align: center">Upload Images</label>
                            <div  id="app">
                                <dropzone :images_data="{{json_encode($album->images)}}"></dropzone>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row btn-padding">
                            <button style="width: 80%" class=" btn btn-primary">Save&nbsp; &nbsp; <i style="top: inherit;left: AUTO;" class="upload-spinn fa fa-cog fa-spin fa-1x fa-fw  hidden"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    @push('top_js')
        {!! HTML::script(asset('/js/app.js')) !!}
    @endpush

    @push('panel_js')
        <script>
            jQuery(".select2").select2({
                width: '100%',
            });
        </script>
        {!! HTML::script('Panel') !!}
        {!! HTML::script('/panel/js/errors.js') !!}
        {!! HTML::script('/panel/js/album.js') !!}

    @endpush
@stop