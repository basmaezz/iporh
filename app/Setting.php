<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'key', 'value'
    ];

    public function key($type)
    {
        return $this->where('key', $type)->first();
    }

    public function valueOf($type)
    {
        return (isset($this->key($type)->value)) ? $this->key($type)->value : '';
    }

    public function whereIn($array)
    {
        return $this->whereIn('key', $array)->get();
    }
}
