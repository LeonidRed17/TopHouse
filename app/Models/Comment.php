<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['content','author','news_id','likes_count'];

    public function news(): BelongsTo
    {
        return $this->belongsTo(News::class);
    }
    public function reactions()
    {
        return $this->belongsToMany(Reaction::class, 'comments_reactions')
            ->withPivot('count')
            ->withTimestamps();
    }
}
