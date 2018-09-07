<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Service extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'title_en',  'text', 'text_en', 'image', 'video', 'views',
    ];

    public function scopeSearch($query, Request $request)
    {

        if ($request->has('text') && !empty($request->get('text'))) {
            $query = $query->where(function ($q) use ($request) {
                $q->where('title', 'LIKE', '%' . $request->get('text') . '%');
                $q->orWhere('title_en', 'LIKE', '%' . $request->get('text') . '%');
                $q->orWhere('text', 'LIKE', '%' . $request->get('text') . '%');
                $q->orWhere('text_en', 'LIKE', '%' . $request->get('text') . '%');
            });
        }
        return $query;
    }

    public function incrementViews()
    {
        return $this->update(['views' => (intval($this->views) + 1)]);
    }

    public function scopeOrderByViews()
    {
        return $this->orderBy('views', 'DESC');
    }


}
