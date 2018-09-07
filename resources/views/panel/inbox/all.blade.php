@php
    $breadcrumb_array = [];
    array_push($breadcrumb_array,collect(['is_last'=>true,'name'=>'عرض البريد الوارد','link'=> lang_route('panel.inbox.all')]));
@endphp
@extends('panel.layouts.index',['sub_title'=>'عرض البريد الوارد' ,'breadcrumb_array'=> $breadcrumb_array])
@section('main')
    @push('panel_css')

    @endpush


    <div class="content">
        <div class="row">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title pull-right">
                        البريد الوارد
                    </h3>
                </div>
                <div class="box-body no-padding">
                    <div class="mailbox-controls">

                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm delete" data-toggle="tooltip"
                                    title="حذف"><i class="fa fa-trash-o"></i></button>
                        </div>
                        <button type="button" class="btn btn-default btn-sm" onclick="location.reload()"><i class="fa fa-refresh"></i></button>

                    </div>
                    {!! Form::open(['id'=>'form','method'=>'post','url'=>admin_url('inbox/delete'),'to'=> admin_url('inbox/all')]) !!}

                    <div class="table-responsive mailbox-messages">
                        <table class="table table-hover no-wrap table-striped">
                            <tbody>
                            @foreach($messages as $i=>$message)
                                <tr>
                                    <td width="5%"><input name="delete[{{$i}}]" value="{{$message->id}}" id="checkbox{{$i}}" type="checkbox"></td>
                                    <td width="20%" class="mailbox-name">{{$message->name}}</td>
                                    <td width="20%" class="mailbox-name">{{$message->email}}</td>
                                    <td width="30%" class="mailbox-subject"><a href="{{admin_url('inbox/view/'.$message->id)}}">{{$message->subject}}</a></td>
                                    <td width="20%" class="mailbox-date">{{diff_for_humans($message->created_at)}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                {!! Form::close() !!}

                    <div class="box-footer no-padding m-b-2">
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            <div class="col-md-offset-5">
                                {{ $messages->links() }}
                            </div>
                            <!-- /.pull-right -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    @push('panel_js')
        {!! HTML::script('/panel/js/post.js') !!}

        <script>
            jQuery(document).ready(function () {

                "use strict";

                jQuery('.delete').click(function () {
                    swal({
                        title: '<span class="info"> هل أنت متأكد من حذف الرسائل المحددة ؟</span>',
                        type: 'info',
                        showCloseButton: true,
                        showCancelButton: true,
                        confirmButtonText: 'حذف',
                        cancelButtonText: 'إغلاق',
                        confirmButtonColor: '#56ace0',
                        width: '500px'
                    }).then(function (value) {
                        $('#form').submit();
                    });
                });

                jQuery('.ckbox input').click(function () {
                    var t = jQuery(this);
                    if (t.is(':checked')) {
                        t.closest('tr').addClass('selected');
                    } else {
                        t.closest('tr').removeClass('selected');
                    }
                });

                // Star
                jQuery('.star').click(function () {
                    if (!jQuery(this).hasClass('star-checked')) {
                        jQuery(this).addClass('star-checked');
                    }
                    else
                        jQuery(this).removeClass('star-checked');
                    return false;
                });

                jQuery('.table-email .media').click(function () {
                    location.href = $(this).data('url');
                });

            });
        </script>
    @endpush
@stop