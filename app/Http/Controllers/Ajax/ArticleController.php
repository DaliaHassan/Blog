<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ArticleRepository;
use Datatables;

class ArticleController extends Controller
{
    public function __construct(ArticleRepository $articles)
    {
        $this->articles = $articles;
    }

    public function index(Request $request)
    {
        return Datatables::of($this->articles->getAjaxIndex()->with('category'))
            ->addColumn('category', function($row){
                return $row->category->name;
            })
            ->addColumn('edit', function($row){
                return route('admin.articles.edit', $row->id);
            })
            ->addColumn('deleteRoute', function($row){
                return route('admin.articles.delete', $row->id);
            })
            ->addColumn('publishRoute', function($row) {
                return route('admin.articles.publish', $row->id);
            })
            ->addColumn('unpublishRoute', function($row) {
                return route('admin.articles.unpublish', $row->id);
            })
            ->addColumn('show', function($row) {
                return route('admin.articles.showComments', $row->id);
            })
            ->make(true);
    }

}
