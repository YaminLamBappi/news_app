<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categories extends Model
{
    protected $fillable = [
        'name',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(news_posts::class);

    }
    //
}
