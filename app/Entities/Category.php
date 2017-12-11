<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Category extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['name'];

    /**
     * Get articles of category
     *
     * @return App\Entities\Category
     */
    public function articles()
    {
        return $this->hasMany(Article::class, 'category_id');
    }

}
