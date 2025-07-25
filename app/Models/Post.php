<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
   ];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
