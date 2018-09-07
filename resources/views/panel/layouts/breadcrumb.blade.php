<div class="content-header sty-one">
    <ol class="breadcrumb">
        @php
            $breadcrumb_array =  (isset($breadcrumb_array)) ? $breadcrumb_array : [];
        @endphp
        @foreach($breadcrumb_array as $item)
            @if($item['is_last'])
                <li><a href="#">{{$item['name']}}</a></li>
            @else
                <li><i class="fa fa-angle-right"></i> <a href="{{$item['link']}}"> {{$item['name']}} </a> </li>
            @endif
        @endforeach
        <li><i class="fa fa-angle-right"></i> الصفحة الرئيسية</li>
    </ol>
    <h1>لوحة التحكم</h1>

</div>
