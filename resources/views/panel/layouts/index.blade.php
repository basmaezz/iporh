
<!DOCTYPE html>
<html lang="{{get_current_locale()}}" dir="rtl">

<!-- Mirrored from uxliner.com/bizadmin/demo/rtl/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Sep 2018 19:36:32 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> {{isset($sub_title)? $sub_title : ' لوحة التحكم | IPORH'}}</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        window['lang'] = '{{get_current_locale()}}';
        window.Laravel = {!! json_encode([
            'csrfToken'=> csrf_token(),
            ])
        !!};
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Biz Admin is a Multipurpose bootstrap 4 Based Dashboard & Admin Site Responsive Template by uxliner." />
    <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Biz Admin, Biz Adminadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
    <meta name="author" content="uxliner"/>
    @include('panel.layouts.css')

    {{--{!! HTML::script('/panel/js/html5shiv.js') !!}--}}
    {{--{!! HTML::script('/panel/js/respond.min.js') !!}--}}

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper boxed-wrapper">

    @include('panel.layouts.header')

    @include('panel.layouts.side-panel')

    <div class="content-wrapper">
        @include('panel.layouts.breadcrumb')
        @yield('main')
    </div>

    @include('panel.layouts.footer')


<!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab"></div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
@include('panel.layouts.js')

@if(session()->has('alert'))
    <script>
        @php
            $alert = session()->get('alert');
            $errors_html = (isset($alert['errors_object'])) ?  $alert['errors_object'] : '';
        @endphp
        customSweetAlert('{{$alert['type']}}', '{{$alert['message']}}', "{!! trim($errors_html) !!}");
    </script>
@endif
</body>

<!-- Mirrored from uxliner.com/bizadmin/demo/rtl/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Sep 2018 19:37:42 GMT -->
</html>


