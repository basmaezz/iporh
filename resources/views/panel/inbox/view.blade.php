@php
    $breadcrumb_array = [];
    array_push($breadcrumb_array,collect(['is_last'=>true,'name'=>'عرض الرسالة','link'=>'#']));
    array_push($breadcrumb_array,collect(['is_last'=>false,'name'=>'عرض البريد الوارد','link'=> lang_route('panel.inbox.all')]));
@endphp
@extends('panel.layouts.index',['sub_title'=>'عرض البريد الوارد' ,'breadcrumb_array'=> $breadcrumb_array])@section('main')
    @push('panel_css')

    @endpush
    <div class="content">
        <div class="row">
            <div class="box box-primary">
            {{--<div class="box-header with-border">--}}
            {{--<h3 class="box-title">Read Mail</h3>--}}
            {{--<div class="box-tools pull-right"><a href="#" class="btn btn-box-tool" data-toggle="tooltip"--}}
            {{--title="Previous"><i class="fa fa-chevron-left"></i></a> <a--}}
            {{--href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i--}}
            {{--class="fa fa-chevron-right"></i></a></div>--}}
            {{--</div>--}}
            <!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="mailbox-read-info">
                        <h5>{{$msg->subject}} </h5>
                        <h4>{{$msg->email}} </h4>
                        <h5>{{$msg->name}} <span class="mailbox-read-time pull-right">{{diff_for_humans($msg->created_at)}}</span></h5>
                    </div>
                    <!-- /.mailbox-read-info -->
                    <div class="mailbox-controls with-border text-left">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm delete" data-toggle="tooltip"
                                    data-container="body" data-url="{{admin_url('inbox/delete/'.$msg->id)}}" title="حذف">
                                <i class="fa fa-trash-o"></i>
                            </button>
                        </div>
                        <!-- /.btn-group -->

                    </div>
                    <div class="mailbox-read-message">
                        <p style="text-align: right;">{!! $msg->text !!}</p>
                    </div>
                    <!-- /.mailbox-read-message -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                </div>

                <!-- /.box-footer -->
            </div>
        </div>
    </div>

    {{--<div class="pageheader">--}}
    {{--<h2><i class="fa fa-home"></i> Dashboard <span> Inbox / View Message  </span></h2>--}}
    {{--</div>--}}
    {{--<div class="contentpanel panel-email">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-12">--}}
    {{--<div class="panel panel-default">--}}
    {{--<div class="panel-body">--}}
    {{--<div class="pull-right">--}}
    {{--<div class="btn-group mr10">--}}

    {{--<button class="btn btn-sm btn-white tooltips delete" type="button" data-toggle="tooltip"--}}
    {{--data-url="{{admin_url('inbox/delete/'.$msg->id)}}" title="Delete"><i--}}
    {{--class="glyphicon glyphicon-trash"></i></button>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row">--}}
    {{--<div class="read-panel">--}}
    {{--<div class="media">--}}
    {{--<a href="#" class="pull-left">--}}
    {{--<img alt="" src="../images/photos/user2.png" class="media-object">--}}
    {{--</a>--}}
    {{--<div class="media-body">--}}
    {{--<span class="media-meta pull-right">{{diff_for_humans($msg->created_at)}}</span>--}}
    {{--<h4 class="text-primary">{{$msg->name}}</h4>--}}
    {{--<small class="text-muted">{{'  From : '.$msg->email}}</small>--}}
    {{--<p class="text-muted">{{$msg->subject}}</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<p>{!! nl2br($msg->text) !!}</p>--}}

    {{--{!! Form::open(['id'=>'form','method'=>'post','url'=>admin_url('inbox/replay-msg'),'to'=> admin_url('inbox/all')]) !!}--}}
    {{--<div style="margin-top: 50px" class="media">--}}
    {{--<a href="#" class="pull-left">--}}
    {{--<img alt="" src="{{url('/image/80x80/default-msg.png')}}" class="media-object">--}}
    {{--</a>--}}
    {{--<div class="media-body">--}}
    {{--<div class="form-group">--}}
    {{--<div>--}}
    {{--<textarea class="form-control " name="text" rows="5"--}}
    {{--placeholder=" Replay here " required></textarea>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<input type="hidden" name="name" value="{{$msg->id}}">--}}
    {{--<input type="hidden" name="email" value="{{$msg->email}}">--}}

    {{--<div class="pull-right" style="margin-top: 10px">--}}
    {{--<button class="btn btn-info">--}}
    {{--&nbsp; <i style="top: inherit;left: AUTO;"--}}
    {{--class="upload-spinn fa fa-cog fa-spin fa-1x fa-fw  hidden"></i>--}}
    {{--Send--}}
    {{--</button>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--{!! Form::close() !!}--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}


    @push('panel_js')
        <script>
            $('.delete').on('click', function (event) {
                var delete_url = $(this).data('url');
                event.preventDefault();
                swal({
                    title: '<span class="info">  هل أنت متأكد من حذف  الرسالة ؟</span>',
                    type: 'info',
                    showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'موافق',
                    cancelButtonText: 'إغلاق',
                    confirmButtonColor: '#56ace0',
                    width: '500px'
                }).then(function (value) {
                    $.ajax({
                        url: delete_url,
                        method: 'delete',
                        type: 'json',
                        success: function (response) {
                            if (response.status) {
                                customSweetAlert(
                                    'success',
                                    response.message,
                                    response.item,
                                    function (event) {
                                        location.href = '/admin/inbox/all';
                                    }
                                );
                            } else {
                                customSweetAlert(
                                    'error',
                                    response.message,
                                    response.errors_object
                                );
                            }
                        },
                        error: function (response) {
                            $('.upload-spinn').addClass('hidden');
                            errorCustomSweet();
                        }
                    });
                });
            });
        </script>

        {!! HTML::script('/panel/js/post.js') !!}

    @endpush
@stop