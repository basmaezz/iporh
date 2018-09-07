@extends('panel.layout.index')
@section('main')
    @push('panel_css')
        {!! HTML::style('panel/css/jquery.datatables.css') !!}
    @endpush
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> الصفحة الرئيسية <span>  مستخدمي الموقع /  عرض الكل    </span></h2>
    </div>
    <div class="contentpanel">
        <div class="row">
            <div class="table-responsive">
                <table class="table" id="table1">
                    <thead>
                    <tr class="text-center">
                        <th class="text-center text-cario" width="5%">#</th>
                        <th class="text-center text-cario" width="10%">الإسم</th>
                        <th class="text-center text-cario" width="10%">البريد الإلكتروني</th>
                        <th class="text-center text-cario" width="10%">مجموعة الصلاحيات</th>
                        <th class="text-center text-cario" width="10%">خيارات</th>
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
            var url = '/ar/admin/account/all/data';
        </script>
        {!! HTML::script('panel/js/admins-datatable.js') !!}

    @endpush
@stop