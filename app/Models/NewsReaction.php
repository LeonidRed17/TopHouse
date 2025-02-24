<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class NewsReaction extends Model

{
    protected $fillable = ['name'];

    public function news(): BelongsToMany
    {
        return $this->belongsToMany(News::class, 'news_reactions')
            ->withPivot('count')
            ->withTimestamps();
    }
}
