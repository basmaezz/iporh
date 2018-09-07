<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class AlbumCategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'text', 'text_en'
    ];

    public function albums()
    {
        return $this->hasMany(PhotoGallery::class, 'category_id', 'id');
    }

    public function scopeNonEmpty($q)
    {
        return $q->has('albums', '>', 0);
    }

}
