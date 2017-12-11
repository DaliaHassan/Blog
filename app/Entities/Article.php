<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Article extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['title', 'body', 'publish', 'category_id'];

    /**
     * Get category of article
     *
     * @return App\Entities\Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * The comments that belong to the article.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'article_id');
    }

}
