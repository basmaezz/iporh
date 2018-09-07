<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VisitorMessage extends Model
{
    use SoftDeletes;


    protected $fillable = [
        'name', 'email', 'subject', 'text', 'read_at'
    ];

    public function markAsRead()
    {
        return $this->update(['read_at' => Carbon::now()]);
    }

    public function scopeUnReadMessages($query){
        return $query->whereNull('read_at');
    }
}
