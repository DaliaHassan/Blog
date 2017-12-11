<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Http\Requests\Admin\Category\CreateRequest;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    public function __construct(CategoryRepository $categories)
    {
        $this->categories = $categories->skipPresenter();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $this->categories->create($request->all());
        return redirect()->route('admin.categories.index')->withSuccess('Category is created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categories->find($id);
        return view('admin.categories.edit', compact('category'));
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
        $this->categories->update($request->all(), $id);
        return redirect()->route('admin.categories.index')->withSuccess('Category is updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $canDelete = $this->categories->canDelete($id);
        $redirect = redirect()->route('admin.categories.index');
        if($canDelete) {
            $this->categories->delete($id);
            return $redirect->withSuccess('Category is deleted Successfully');
        }
        return $redirect->withError('Category cannot be deleted, It is used in a article');

    }
}
