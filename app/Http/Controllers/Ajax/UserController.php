<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ArticleRepository;
use Datatables;

class UserController extends Controller
{
    public function __construct(ArticleRepository $articles)
    {
        $this->articles = $articles;
    }

    public function index(Request $request)
    {
        return Datatables::of($this->articles->getPublishArticles()->with('category'))
            ->addColumn('category', function($row){
                return $row->category->name;
            })
            ->addColumn('addComment', function($row){
                return route('web.comments.create');
            })
            ->make(true);

    }

}
