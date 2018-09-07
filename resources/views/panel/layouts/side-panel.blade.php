@php
    $admin = auth('admin')->user();
@endphp
<aside class="main-sidebar">
    <!-- sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="image text-center"><img src="/panel/img/img1.jpg" class="img-circle" alt="User Image"></div>
            <div class="info">
                <p>{{$admin->name}}</p>
                <a href="#"><i class="fa fa-envelope"></i></a>
                <a href="#"><i class="fa fa-gear"></i></a>
                <a href="#"><i class="fa fa-power-off"></i></a>
            </div>
        </div>

        <!-- sidebar menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">أقسام الموقع</li>
            <li class="{{is_active('dashboard')}}">
                <a href="{{lang_route('panel.dashboard')}}">
                    <i class="icon-home"></i>
                    <span>الصفحة الرئيسية</span>
                </a>
            </li>
            <li class="treeview {{is_element_active('/post/i')}}">
                <a href="#">
                    <i class="ti-layout-list-post"></i>
                    <span>الأنشطة والأخبار</span>
                    <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{is_active('post/categories')}}"><a href="{{lang_route('panel.post.categories')}}"><i class="fa fa-angle-left"></i> تصنيفات الأخبار </a></li>
                    <li class="{{is_active('post/create')}}"><a href="{{lang_route('panel.post.create')}}"><i class="fa fa-angle-left"></i> إضافة جديد </a></li>
                    <li class="{{is_active('post/all')}}"><a href="{{lang_route('panel.post.all')}}"><i class="fa fa-angle-left"></i> عرض الكل </a></li>
                </ul>
            </li>
            <li class="treeview {{is_element_active('/project/i')}}">
                <a href="#">
                    <i class="ti-view-list-alt"></i>
                    <span>المشاريع</span>
                    <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{is_active('project/create')}}"><a href="{{lang_route('panel.project.create')}}"><i class="fa fa-angle-left"></i> إضافة جديد </a></li>
                    <li class="{{is_active('project/all')}}"><a href=" {{lang_route('panel.project.all')}}"><i class="fa fa-angle-left"></i> عرض الكل </a></li>
                </ul>
            </li>

            <li class="treeview {{is_element_active('/service/i')}}">
                <a href="#">
                    <i class="ti-bar-chart-alt"></i>
                    <span>الخدمات</span>
                    <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{is_active('service/create')}}"><a href="{{lang_route('panel.service.create')}}"><i class="fa fa-angle-left"></i> إضافة جديد </a></li>
                    <li class="{{is_active('service/all')}}"><a href=" {{lang_route('panel.service.all')}}"><i class="fa fa-angle-left"></i> عرض الكل </a></li>
                </ul>
            </li>

            <li class="treeview {{is_element_active('/album/i')}}">
                <a href="#">
                    <i class="ti-gallery"></i>
                    <span>ألبومات الصور</span>
                    <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{is_active('album/categories')}}"><a href="{{lang_route('panel.album.categories')}}"><i class="fa fa-angle-left"></i> تصنيفات الألبومات </a></li>
                    <li class="{{is_active('album/create')}}"><a href="{{lang_route('panel.album.create')}}"><i class="fa fa-angle-left"></i> إضافة جديد </a></li>
                    <li class="{{is_active('album/all')}}"><a href="{{lang_route('panel.album.all')}}"><i class="fa fa-angle-left"></i> عرض الكل </a></li>
                </ul>
            </li>

            <li class="treeview {{is_element_active('/advertisement/i')}}">
                <a href="#">
                    <i class="icon-speech"></i>
                    <span>الإعلانات</span>
                    <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{is_active('advertisement/create')}}"><a href="{{lang_route('panel.advertisement.create')}}"><i class="fa fa-angle-left"></i> إضافة جديد </a></li>
                    <li class="{{is_active('advertisement/all')}}"><a href=" {{lang_route('panel.advertisement.all')}}"><i class="fa fa-angle-left"></i> عرض الكل </a></li>
                </ul>
            </li>


            <li class="{{is_parent_active('inbox')}}">
                <a href="{{lang_route('panel.inbox.all')}}">
                    <i class="fa fa-envelope-o"></i>
                    <span>البريد الوارد</span>
                </a>
            </li>


            <li class="{{is_parent_active('sponsors')}}">
                <a href="{{lang_route('panel.sponsors.index')}}">
                    <i class="fa fa-heart"></i>
                    <span>شركاؤنا</span>
                </a>
            </li>


            <li class="{{is_parent_active('donation')}}">
                <a href="{{lang_route('panel.donation.all')}}">
                    <i class="fa fa-money"></i>
                    <span>التبرعات</span>
                </a>
            </li>


            <li class="header">الإعدادات</li>


            <li class="treeview {{is_element_active('/settings/i')}}">
                <a href="#">
                    <i class="icon-wrench"></i>
                    <span>إعدادات الموقع</span>
                    <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{is_active('settings/website')}}"><a href="{{lang_route('panel.settings.website')}}"><i class="fa fa-angle-left"></i>  إعدادات الموقع </a></li>
                    <li class="{{is_active('settings/socials')}}"><a href=" {{lang_route('panel.settings.socials')}}"><i class="fa fa-angle-left"></i>  مواقع التواصل الإجتماعي  </a></li>
                </ul>
            </li>


            <li class="treeview">
                <a href="#">
                    <i class="icon-layers"></i>
                    <span>إعدادت القوالب</span>
                    <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages-blank.html"><i class="fa fa-angle-left"></i> قالب السلايدر</a></li>
                    <li><a href="pages-blank.html"><i class="fa fa-angle-left"></i> قالب التبرعات </a></li>
                    <li><a href="pages-blank.html"><i class="fa fa-angle-left"></i> قالب من نحن </a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- /.sidebar -->
</aside>