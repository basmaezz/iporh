<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostCategory extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'text', 'text_en',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }


    public function scopeNonEmpty($q)
    {
        return $q->has('posts', '>', 0);
    }
}
