@extends('panel.layout.index')
@section('main')
    @push('panel_css')
        {!! HTML::style('panel/css/jquery.datatables.css') !!}
    @endpush
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> الصفحة الرئيسية <span>  {{( $type == 'student') ? ' الطلاب' : 'المدرسين'}} /  عرض الكل  </span></h2>
    </div>
    <div class="contentpanel">
        <div class="row">
            <div class="table-responsive">
                <table class="table" id="table1">
                    <thead>
                    <tr class="text-center">
                        <th class="text-center text-cario" width="5%">#</th>
                        <th class="text-center text-cario" width="10%">إسم المستخدم</th>
                        <th class="text-center text-cario" width="10%">البريد الإلكتروني</th>
                        <th class="text-center text-cario" width="10%">حالة الحساب</th>
                        <th class="text-center text-cario" width="10%">تاريخ التسجيل</th>
                        <th class="text-center text-cario" width="20%">خيارات</th>
                    </tr>
                    </thead>
                    <tbody class="text-center"></tbody>
                </table>
            </div>
        </div>
    </div>
    @push('panel_js')
        {!! HTML::script('panel/js/jquery.datatables.min.js') !!}
        <script>
            var url = '{{lang_route('panel.'.$type.'.all.data')}}';
            jQuery(document).ready(function () {
                $(document).on('click', '.delete', function (event) {
                    var delete_url = $(this).data('url');
                    event.preventDefault();
                    swal({
                        title: '<span class="info">  هل أنت متأكد من الحذف  ؟</span>',
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

                $(document).on('click', '.status', function (event) {
                    var status_url = $(this).data('url');
                    event.preventDefault();
                    $.ajax({
                        url: status_url,
                        method: 'GET',
                        type: 'json',
                        success: function (response) {
                            if (response.status) {
                                tbl.ajax.reload();
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
                $(document).on('click', '.type', function (event) {
                    var url = $(this).data('url');
                    event.preventDefault();
                    $.ajax({
                        url: url,
                        method: 'GET',
                        type: 'json',
                        success: function (response) {
                            if (response.status) {
                                tbl.ajax.reload();
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
                var tbl = $('#table1').DataTable({
                    "columnDefs": [
                        {"orderable": false, targets: '_all'}
                    ],
                    "bSort": false,
                    "processing": true,
                    "serverSide": true,
                    "info": false,
                    "direction": 'ltr',
                    "ajax": {
                        "url": url
                    },
                    "columns": [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'email', name: 'email'},
                        {data: 'status', name: 'status'},
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
                    "pageLength": 10,
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
                    }
                });
            });
        </script>
    @endpush
@stop