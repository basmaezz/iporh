@extends('panel.layout.index')
@section('main')
    @push('panel_css')
        {!! HTML::style('panel/css/jquery.datatables.css') !!}
        {{--{!! HTML::style('panel/css/view-items.css') !!}--}}

    @endpush

    <div class="pageheader">
        <h2><i class="fa fa-home"></i> الصفحة الرئيسية <span> الصلاحيات  /   عرض الكل   </span></h2>
    </div>


    <div class="contentpanel">

        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead>
                            <tr class="text-center">
                                <th class="text-center text-cario" width="5%">#</th>
                                <th class="text-center text-cario" width="10%"> إسم المجموعة </th>
                                <th class="text-center text-cario" width="20%">وصف المجموعة</th>
                                <th class="text-center text-cario" width="10%">خيارات</th>
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


    @push('panel_js')
        {!! HTML::script('panel/js/jquery.datatables.min.js') !!}
        <script>
            var url = '/admin/role/all/data';
        </script>
        {!! HTML::script('Panel') !!}

    @endpush
@stop