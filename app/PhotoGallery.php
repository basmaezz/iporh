<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhotoGallery extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id', 'title', 'title_en', 'description', 'description_en', 'is_active'
    ];

    public function images()
    {
        return $this->belongsToMany(Image::class , 'image_categories', 'owner_id', 'image_id')->where('owner_model', 'App\PhotoGallery');
    }

    public function updateImages($images)
    {
        if (isset($images) && count($images) > 0) {
            $pivotData = array_fill(0, count($images), ['owner_model' => 'App\PhotoGallery']);
            $syncData = array_combine($images->toArray(), $pivotData);
            $this->images()->sync($syncData);
        }
    }

    public function category()
    {
        return $this->belongsTo(AlbumCategory::class, 'category_id', 'id');
    }

    public function getCategoryName()
    {
        return ($this->hasCategory()) ? get_text_locale($this->category, 'text') : no_data();
    }

    public function hasCategory()
    {
        return (isset($this->category));
    }

    public function firstImage()
    {
        $img = (isset($this->images)) ?$this->images->first(): null;
        return (isset($img)) ? image_url($img->file_name) : 'default.png';
    }

}
