@extends('panel.layout.index')
@section('main')
    @push('panel_css')
        {!! HTML::style('panel/css/jquery.datatables.css') !!}

    @endpush

    <div class="pageheader">
        <h2><i class="fa fa-home"></i> الصفحة الرئيسية <span> القائمة البريدية /  عرض القائمة البريدية    </span></h2>
    </div>


    <div class="contentpanel">

        <div class="row">

            <div class="table-responsive">
                <table class="table" id="table1">
                    <thead>
                    <tr>
                        <th class="text-center text-cario" width="5%" >#</th>
                        <th class="text-center text-cario" width="15%">البريد الإلكتروني</th>
                        <th class="text-center text-cario" width="15%">الحالة</th>
                        <th class="text-center text-cario" width="15%">خيارات</th>

                    </tr>
                    </thead>

                    <tbody style="text-align: center">

                    </tbody>
                </table>
            </div>

        </div>

    </div>


    @push('panel_js')


        {!! HTML::script('panel/js/jquery.datatables.min.js') !!}

        <script>
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

                $(document).on('click', '.change-status', function () {
                    var id = $(this).attr('data-id');
                    $.ajax({
                        url: '{{admin_url('mail-list/status')}}/' + id,
                        type: 'GET',
                        dataType: 'json',
                        success: function (response) {
                            if (response) {
                                tbl.ajax.reload();
                            }
                        },
                        error: function (xhr) {

                        }

                    })
                });

                var tbl = $('#table1').DataTable({
                        "columnDefs": [
                            {"orderable": false, targets: '_all'}
                        ],
                        "bSort": false,
                        "processing": true,
                        "serverSide": true,
                        "info": false,
                        "ajax": {
                            "url": '{{lang_route('panel.mail.data')}}'
                        },
                        "columns": [
                            {data: 'id', name: 'id'},
                            {data: 'email', name: 'email'},
                            {data: 'status', name: 'status'},
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
                        , language: {
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