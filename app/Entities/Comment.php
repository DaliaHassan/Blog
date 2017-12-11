<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Comment extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['comment', 'article_id'];

    /**
     * The articles that belong to the comments.
     */
    public function articles()
    {
        return $this->belongsTo(Article::class);

    }
}
