<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use SoftDeletes;

    protected $table = 'images';


    protected $fillable = [
        'display_name', 'file_name', 'mime_type', 'size'
    ];



    public static $rules = [
        'image' => 'required|mimes:png,gif,jpeg,jpg,bmp,svg,ico'
    ];

    public static $messages = [
        'image.mimes' => 'الملف الذي تحاول رفعه له صيغة غير مدعومة',
        'image.required' => 'الصورة مطلوبة'
    ];
}
