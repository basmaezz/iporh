<?php
function front_url($route){
    return url('front/'.$route);
}

function get_current_locale()
{
    return \Illuminate\Support\Facades\App::getLocale();
}


function is_auth()
{
    return (isset(auth()->user()->id)) ? true : false;
}

function settings_object()
{
    return new \App\Setting();
}

function sub_words($phrase, $max_words, $index = 0)
{
    $phrase_array = explode(' ', $phrase);
    dd($phrase_array);
    if (count($phrase_array) > $max_words && $max_words > 0)
        $phrase = implode(' ', array_slice($phrase_array, $index, $max_words)) . ' ';
    return $phrase;
}

function get_about_info($type, $is_icon = true)
{
    switch ($type) {
        case 1 :
            return ($is_icon) ? 'icon flaticon-target' : 'OUR MISSION';
        case 2 :
            return ($is_icon) ? 'icon flaticon-eye' : 'OUR VISION';
        case 3 :
            return ($is_icon) ? 'icon flaticon-envelope' : 'OUR MESSAGE';
    }
    return '';
}

function get_all_album_cats()
{
    return \App\AlbumCategory::all();
}

function ajax_render_view($view, $data)
{
    try {
        return view($view, $data)->render();
    } catch (\Throwable $e) {
    }
    return [''];
}

function get_constant_value($key)
{
    $constant = new \App\Setting();
    return $constant->valueOf($key);
}

function panel_url($route)
{
    return url('panel/'.$route);
}

function image_url($img, $size = '')
{
    return (!empty($size)) ? lang_url('image/' . $size . '/' . $img) : lang_url('image/' . $img);
}


function file_url($file)
{
    return lang_url('file/' . $file);
}

function get_date_from_timestamp($timestamp)
{
    return format_timestamp_date($timestamp, 'Y-m-d');
}

function get_time_from_timestamp($timestamp)
{
    return format_timestamp_date($timestamp, 'H:i');
}

function format_timestamp_date($timestamp, $format)
{
    return (isset($timestamp) && isset($format)) ? \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $timestamp)->format($format) : '';
}

function format_12_to_24($input)
{
    return date("H:i", strtotime($input));
}

function format_24_to_12($input)
{
    return date("g:i a", strtotime($input));
}


function get_social_icon($social)
{
    switch ($social) {
        case 'facebook' :
            return 'icon-facebook';
        case 'twitter' :
            return 'icon-twitter';
        case 'linkedin' :
            return 'icon-linkedin-logo';
        case 'google' :
            return 'icon-google-plus';
        case 'instagram' :
            return 'icon-instagram-symbol';
        case 'youtube' :
            return 'icon-youtube-logo';
    }
    return '';
}

function get_social_icon_footer($social)
{
    switch ($social) {
        case 'facebook' :
            return 'fa fa-facebook';
        case 'twitter' :
            return 'fa fa-twitter';
        case 'linkedin' :
            return 'fa fa-linkedin';
        case 'google' :
            return 'fa fa-google';
        case 'instagram' :
            return 'fa fa-instagram';
        case 'youtube' :
            return 'fa fa-youtube-play';
    }
    return '';
}


function get_socials()
{
    return \App\SocialMedia::all();
}


function get_all_categories()
{
    return \App\CourseCategory::all();
}

function string_limit($str, $char_num)
{
    return str_limit(strip_tags($str), $limit = $char_num, $end = ' ...');
}

function is_free($value)
{
    return (isset($value) && $value > 0) ? $value . '$' : 'مجاناً';
}

function array_map_int($input)
{
    if (isset($input) && is_string($input)) {
        return array_map('intval', explode(',', $input));
    }
    return [];
}

function convert_array_map_int($input)
{
    if (isset($input) && is_array($input)) {
        return array_map('intval', $input);
    }
    return [];
}

function get_request_status($request)
{
    switch ($request->status) {
        case 'pending_teacher' :
            return __("بإنتظار موافقة المدرس");
        case 'pending_student' :
            return __('بإنتظار تأكيد الطالب');
        case 'progress' :
            return (isset($request->is_confirmed) && (int)$request->is_confirmed == 0) ? __('قيد التنفيذ') : __('بإنتظار تأكيد التسليم');
        case 'completed' :
            return __('مكتملة');
        case 'canceled' :
            return __('ملغية');
        case 'rejected' :
            return __('مرفوضة');
        default:
            return '';
    }
}

function get_most_teacher_request()
{
    $teachers = new \App\User();
    return $teachers->active()->teachers()->orderBy('rating', 'DESC')->take(8)->get();
}

function get_all_teachers()
{
    $teachers = new \App\User();
    return $teachers->active()->teachers()->orderBy('rating', 'DESC')->get();
}

function is_type_checked($array, $input)
{
    if (isset($array) && isset($input)) {
        foreach ($array as $item) {
            if ($input == $item) {
                return 'checked';
            }
        }
    }
    return '';
}

function is_speciality_selected($inputs, $speciality)
{
    if ((isset($inputs['specialities']) && $inputs['specialities'] == $speciality->id) || (isset($inputs['sub_specialty']) && isset($speciality->subSpecialties()->find($inputs['sub_specialty'])->id))) {
        return 'selected';
    }
    return '';
}

function get_financial_process_status($process)
{
    if ($process->isCredit()) {
        switch ($process->credit_type) {
            case 'paypal':
                return 'إيداع مباشر عن طريق PayPal';
            case 'visa':
                return 'إيداع مباشر عن طريق Visa';
            case 'website':
                return 'إيداع من طلبات التدريب';
        }
    } else {
        switch ($process->credit_type) {
            case 'paypal':
                return 'سحب مباشر عن طريق PayPal';
            case 'visa':
                return 'سحب مباشر عن طريق Visa';
            case 'website':
                return 'سحب من طلبات التدريب';
        }
    }
    return '';
}

function no_data()
{
    return 'لا يوجد بيانات';
}

function get_training_percent()
{
    $constant = new \App\Constant();
    $percent = $constant->valueOf('percent');
    return isset($percent) ? (double)$percent : 20;
}

function get_profit($price)
{
    $percent = get_training_percent();
    $percent = (isset($percent) && $percent >= 0 && $percent <= 100) ? (100 - $percent) : 80;
    return (($percent * $price) / 100);
}

function get_unread_notifications_count()
{
    return (isset(auth()->user()->unreadNotifications) && auth()->user()->unreadNotifications->count() > 0) ? auth()->user()->unreadNotifications->count() : 0;
}


function admin_url($uri)
{
    return lang_url('admin/' . $uri);
}

function is_menu_element_active($uri)
{
    if (preg_match($uri, url()->current())) {
        return 'current dropdown';
    }
    return '';
}

function diff_for_humans($timestamp)
{
    \Carbon\Carbon::setLocale(get_current_locale());
    return (is_string($timestamp)) ? \Carbon\Carbon::createFromTimestampUTC(strtotime($timestamp))->diffForHumans() : $timestamp->diffForHumans();
}

function is_nav_active($array)
{
    foreach ($array as $item) {
        if (strpos(url()->current(), $item) !== false) {
            return 'display: block';
        }
    }
    return '';
}

function is_active($uri)
{
    if (admin_url($uri) == url()->current()) {
        return 'active';
    }
    return '';
}


function is_element_active($uri, $uri2 = null)
{
    return (isset($uri2)) ? ((preg_match($uri, url()->current()) || (preg_match($uri2, url()->current())) ? 'active menu-open' : '')) : ((preg_match($uri, url()->current())) ? 'active nav-active' : '');
}

function is_parent_active($uri){
    return (preg_match('/'.$uri.'/i', url()->current())) ? 'active' : '';
}
function get_unread_message_count()
{
    $messages = new \App\VisitorMessage();
    return $messages->unReadMessages()->count();
}

function is_menu_active($uri)
{
    if (preg_match($uri, url()->current())) {
        return 'active';
    }
    return '';
}

function get_locale_changer_URL($locale)
{
    $uri = request()->segments();
    $uri[0] = $locale;
    return url(implode($uri, '/'));
}

function get_text_locale($obj, $text)
{
    if (isset($obj)) {
        $val = (get_current_locale() == 'en') ? $text : ($text . '_en');
        return $obj->$val;
    }
    return no_data();
}

function get_training_request_data()
{
    $trainingRequests = new \App\TrainingRequest;
    return $trainingRequests->getArrayCount();
}
function is_selected($var1,$var2){
    return ($var1 == $var2) ? 'selected' : '' ;
}

function get_visitor_data()
{
    $items = new \App\VisitorMessage;
    return $items->getArrayCount();
}

function get_all_post_cats()
{
    return \App\PostCategory::all();
}

function get_non_empty_post_cats()
{
    return \App\PostCategory::nonEmpty()->get();
}

function get_teachers_data()
{
    $items = \App\User::where('type', '2');
    $all = $items;
    $day = $items;
    $month = $items;
    $array['all'] = $all->count();
    $array['day'] = $day->whereRaw('Date(created_at) = CURDATE()')->get()->count();
    $array['month'] = $month->where(\Illuminate\Support\Facades\DB::raw('MONTH(created_at)'), '=', date('n'))->get()->count();
    return $array;
}

function get_students_data()
{
    $items = \App\User::where('type', '1');
    $all = $items;
    $day = $items;
    $month = $items;
    $array['all'] = $all->count();
    $array['day'] = $day->whereRaw('Date(created_at) = CURDATE()')->get()->count();
    $array['month'] = $month->where(\Illuminate\Support\Facades\DB::raw('MONTH(created_at)'), '=', date('n'))->get()->count();
    return $array;
}

function YoutubeID($url)
{
    if (strlen($url) > 11) {
        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
            return $match[1];
        } else
            return false;
    }
    return $url;
}

function get_video_embed($link)
{
    $error_msg = '';
    $full_link = '';
    $thumbnail_url = null;
    $code_pattern = '<div><div style="width: 100%; height: 0px; position: relative; padding-bottom: 56.2493%;"><iframe src="{URL}" frameborder="0" allowfullscreen style="width: 100%; height: 100%; position: absolute;"></iframe></div></div>';
    $url_parts = parse_url(strtolower($link));
    if (array_key_exists('host', $url_parts)) {
        if (isset($url_parts['query'])) {
            parse_url(parse_str(parse_url($link, PHP_URL_QUERY), $query_parts));
            if (isset($query_parts['v']) && @file_get_contents('https://www.youtube.com/oembed?format=json&url=http://www.youtube.com/watch?v=' . $query_parts['v'])) {
                $full_link = 'https://www.youtube.com/embed/' . $query_parts['v'] . '?wmode=transparent&rel=0&autohide=1&showinfo=0&enablejsapi=1';
                $code = str_replace('{URL}', $full_link, $code_pattern);
                $thumbnail_url = '"https://img.youtube.com/vi/' . $query_parts['v'] . '/mqdefault.jpg';
            } else {
                $error_msg = trans('phrases.invalid_video_link');
            }
        } else {
            $error_msg = trans('phrases.invalid_video_link');
        }
    } else {
        $error_msg = "عذرا الرابط خطأ";
    }

    return $full_link;
}

function album_col_md($index)
{
    if ($index <= 3) {
        return '4';
    }
    if ($index > 3 && $index <= 5) {
        return '6';
    }
    if ($index == 6) {
        return '12';
    }
    return '4';

}

function get_all_sponsors()
{
    return \App\Sponsor::all();
}
