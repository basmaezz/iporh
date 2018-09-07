@extends('panel.layouts.index')
@section('main')
    @push('panel_css')
        {!! HTML::style('panel/css/jquery.datatables.css') !!}
    @endpush
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> Dashboard <span> Donation / Show All </span></h2>
    </div>
    <div class="contentpanel">
        <div class="row">
            <div class="table-responsive">
                <table class="table" id="table1">
                    <thead>
                    <tr class="text-center">
                        <th class="text-center text-cario" width="5%">#</th>
                        <th class="text-center text-cario" width="10%">Name</th>
                        <th class="text-center text-cario" width="10%">Email</th>
                        <th class="text-center text-cario" width="10%">Amount</th>
                        <th class="text-center text-cario" width="10%">Created At</th>
                        <th class="text-center text-cario" width="10%">Actions</th>
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
            var url = '{{lang_route('panel.donation.all.data')}}';
        </script>
        {!! HTML::script('panel/js/donation-datatable.js') !!}
    @endpush
@stop