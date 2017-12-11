<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Article\UpdateRequest;
use App\Http\Requests\Admin\Article\CreateRequest;
use App\Repositories\ArticleRepository;
use App\Repositories\CommentRepository;

class ArticleController extends Controller
{
    public function __construct(ArticleRepository $articles, CategoryRepository $categories, CommentRepository $comments)
    {
        $this->articles = $articles->skipPresenter();
        $this->categories = $categories->skipPresenter();
        $this->comments = $comments->skipPresenter();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.articles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categories->all()->pluck('name', 'id');
        return view('admin.articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $this->articles->create($request->all());
        return redirect()->route('admin.articles.index')->withSuccess('Article is created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comments = $this->comments->getCommentsOfArtice($id);
        return view('admin.articles.show', compact('comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = $this->articles->find($id);
        $categories = $this->categories->all()->pluck('name', 'id');
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        if(!isset($request['publish'])) {
            $request['publish'] = 0;
        }
        $this->articles->update($request->all(), $id);
        return redirect()->route('admin.articles.index')->withSuccess('Article is updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $canDelete = $this->articles->canDelete($id);
        $redirect = redirect()->route('admin.articles.index');
        if($canDelete) {
            $this->articles->delete($id);
            return $redirect->withSuccess('Article is deleted Successfully');
        }
        return $redirect->withError('Article cannot be deleted, It has comments.');
    }

    /**
     * publish the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function publish($id)
    {
        $request['publish'] = 1;
        $this->articles->update($request, $id);
        return redirect()->route('admin.articles.index')->withSuccess('Article is published Successfully');
    }

    /**
     * unpublish the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unpublish($id)
    {
        $request['publish'] = 0;
        $this->articles->update($request, $id);
        return redirect()->route('admin.articles.index')->withSuccess('Article is unpublished Successfully');
    }

}
