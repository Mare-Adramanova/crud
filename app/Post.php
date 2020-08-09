<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','content','slug','description'];

    public $validated = [

        'title' => ['required', 'min:5', 'max:10'],
        'content' => 'required',
        'slug' => 'required',
        'description' => ['required', 'email:rfc']
        ];
}
