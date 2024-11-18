<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class news_posts extends Model
{
    protected $fillable = [
        "tite",
        "description",
        "image",
    ];
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    //
}
