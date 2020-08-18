<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    protected $fillable = ['text', 'color'];

    //protected $guarded = [];

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
