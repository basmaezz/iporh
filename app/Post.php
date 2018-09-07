<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Post extends Model
{
    protected $table = 'posts';
    use SoftDeletes;

    protected $fillable = [
        'category_id', 'title', 'title_en', 'description', 'description_en', 'text', 'text_en', 'image', 'video', 'views',
    ];

    public function scopeSearch($query, Request $request)
    {

        if ($request->has('text') && !empty($request->get('text'))) {
            $query = $query->where(function ($q) use ($request) {
                $q->where('title', 'LIKE', '%' . $request->get('text') . '%');
                $q->orWhere('title_en', 'LIKE', '%' . $request->get('text') . '%');
                $q->orWhere('description', 'LIKE', '%' . $request->get('text') . '%');
                $q->orWhere('description_en', 'LIKE', '%' . $request->get('text') . '%');
                $q->orWhere('text', 'LIKE', '%' . $request->get('text') . '%');
                $q->orWhere('text_en', 'LIKE', '%' . $request->get('text') . '%');
            });
        }
        if ($request->has('category_id') && !empty($request->get('category_id'))) {
            $query = $query->where('category_id', $request->get('category_id'));
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

    public function images()
    {
        return $this->belongsToMany(Image::class, 'image_categories', 'owner_id', 'image_id')->where('owner_model', 'App\Post');
    }

    public function updateImages($images)
    {
        if (isset($images) && count($images) > 0) {
            $pivotData = array_fill(0, count($images), ['owner_model' => 'App\Post']);
            $syncData = array_combine($images->toArray(), $pivotData);
            $this->images()->sync($syncData);
        }
    }


    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'category_id', 'id');
    }

    public function getCategoryName()
    {
        return ($this->hasCategory()) ? get_text_locale($this->category, 'text') : no_data();
    }

    public function hasCategory()
    {
        return (isset($this->category));
    }

}
