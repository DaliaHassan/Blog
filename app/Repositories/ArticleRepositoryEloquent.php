<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ArticleRepository;
use App\Entities\Article;
use App\Validators\ArticleValidator;

/**
 * Class ArticleRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ArticleRepositoryEloquent extends BaseRepository implements ArticleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Article::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getAjaxIndex()
    {
        return $this->model->newQuery();
    }

    public function getPublishArticles()
    {
        return $this->model->where('publish', 1)->newQuery();
    }
    public function canDelete($id)
    {
        $comment = $this->model->with('comments')->find($id);

        if($comment->comments->count() == 0) {
            return true;
        }
        return false;
    }



}
