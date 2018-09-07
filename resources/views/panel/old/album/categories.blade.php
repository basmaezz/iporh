@extends('panel.layouts.index')
@section('main')
    @push('panel_css')
        {!! HTML::style('panel/css/jquery.datatables.css') !!}
    @endpush

    <div class="pageheader">
        <h2><i class="fa fa-home"></i> Dashboard <span>Photo Albums / Categories </span></h2>
    </div>


    <div class="contentpanel">

        <div class="row">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <div class="panel-btns">
                        <button style="width: 13%" class="btn btn-success" data-toggle="modal"
                                data-target=".bs-example-modal-photo"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add Category
                        </button>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead>
                            <tr class="text-center">
                                <th class="text-center text-cario" width="5%">#</th>
                                <th class="text-center text-cario" width="10%"> Category </th>
                                <th class="text-center text-cario" width="10%"> Category (Arabic) </th>
                                <th class="text-center text-cario" width="10%"> Actions </th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>

    </div>
    <div id="country_modal" class="modal fade bs-example-modal-photo " tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-photo-viewer">
            {!! Form::open(['id'=>'form','url'=>admin_url('album/categories/create')]) !!}
            <div style="height:auto" class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                    <h4 class="modal-title">Album Categories </h4>
                </div>
                <div class="modal-body">
                    <div id="loader" class="col-md-offset-6 hidden">
                        <img src="/panel/images/loaders/loader10.gif" alt="">
                    </div>

                    <div id="modal_body" class="row">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="icon" id="photo">
                        <div class="col-md-9 col-md-offset-2">

                            <div class="form-group">
                                <label class="control-label" style="text-align: center">Category</label>
                                <input type="text" id="text" name="text" placeholder="Enter Category" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label class="control-label" style="text-align: center">Category (Arabic)</label>
                                <input  style="text-align: right" type="text" id="text_ar" name="text_ar" placeholder="Enter Arabic Category" class="form-control" required/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row btn-padding">
                        <button style="width: 15%" class="btn btn-success pull-right"> Save &nbsp; &nbsp; <i style="top: inherit;left: AUTO;" class="upload-spinn fa fa-cog fa-spin fa-1x fa-fw  hidden"></i></button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}

        </div>
    </div>


    @push('panel_js')
        {!! HTML::script('panel/js/jquery.datatables.min.js') !!}
        {!! HTML::script('Panel') !!}
        {!! HTML::script('/panel/js/errors.js') !!}
        <script>
            var url = '{{lang_route('panel.album.categories.data')}}';
        </script>
        {!! HTML::script('panel/js/categories-datatable.js') !!}

    @endpush
@stop