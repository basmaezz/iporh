@php
    $breadcrumb_array = [];
    array_push($breadcrumb_array,collect(['is_last'=>true,'name'=>'المشاريع','link'=> lang_route('panel.project.all')]));
@endphp
@extends('panel.layouts.index',['sub_title'=>'عرض المشاريع' ,'breadcrumb_array'=> $breadcrumb_array])
@section('main')
    @push('panel_css')
        {!! HTML::style('panel/plugins/datatables/css/dataTables.bootstrap.min.css') !!}
    @endpush
    <div class="content">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">

                    <table id="table1" class="table table-bordered table-hover" data-name="cool-table">
                        <caption class="bottom">
                            <button  class="btn btn-default" onclick="window.open('/admin/project/create')">إضافة جديد
                                <i class="fa fa-plus icon-btn-margin"></i>
                            </button>
                        </caption>
                        <thead>
                        <tr>
                            <th  width="5%">#</th>
                            <th width="20%">العنوان</th>
                            <th width="30%">الوصف</th>
                            <th width="15%">تاريخ الإضافة</th>
                            <th width="20%"></th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>



    @push('panel_js')
        {!! HTML::script(panel_url('plugins/datatables/jquery.dataTables.min.js')) !!}
        {!! HTML::script(panel_url('plugins/datatables/dataTables.bootstrap.min.js')) !!}
        <script>
            var url = '{{lang_route('panel.project.all.data')}}';
            jQuery(document).ready(function () {
                var tbl = $('#table1').DataTable({
                    "columnDefs": [
                        {"orderable": false, targets: '_all'}
                    ],
                    language: {
                        "sSearch": " ",
                        "searchPlaceholder": "إبحث ",
                        "sProcessing": " جارٍ التحميل ... ",
                        "sLengthMenu": "أظهر _MENU_ مدخلات",
                        "sZeroRecords": "لم يعثر على أية سجلات",
                        "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                        "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                        "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                        "sInfoPostFix": "",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "الأول",
                            "sPrevious": "السابق",
                            "sNext": "التالي",
                            "sLast": "الأخير"
                        }
                    },
                    "bSort": false,
                    "processing": true,
                    "serverSide": true,
                    "info": false,
                    "ajax": {
                        "url": url
                    },
                    "columns": [
                        {data: 'id', name: 'id'},
                        {data: 'title', name: 'title'},
                        {data: 'text', name: 'text'},
                        {data: 'created_at', name: 'created_at'},
                        {data: 'action', name: 'action'}
                    ],
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            text: '',
                            className: 'hidden'
                        }
                    ],
                    "bLengthChange": true,
                    "bFilter": true,
                    "pageLength": 10
                });
                $(document).on('click', '.delete', function (event) {
                    var delete_url = $(this).data('url');
                    event.preventDefault();
                    swal({
                        title: '<span class="info">هل أنت متأكد من حذف العنصر المحدد ؟</span>',
                        type: 'info',
                        showCloseButton: true,
                        showCancelButton: true,
                        confirmButtonText: 'حذف',
                        cancelButtonText: 'إغلاق',
                        confirmButtonColor: '#56ace0',
                        width: '450px'
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
                                            tbl.ajax.reload();
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
            });
        </script>
    @endpush
@stop