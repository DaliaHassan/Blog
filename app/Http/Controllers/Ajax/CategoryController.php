<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use Datatables;
class CategoryController extends Controller
{
    public function __construct(CategoryRepository $categories)
    {
        $this->categories = $categories;
    }

    public function index(Request $request)
    {
        return Datatables::of($this->categories->getAjaxIndex())
            ->addColumn('edit', function($row){
                return route('admin.categories.edit', $row->id);
            })
            ->addColumn('delete', function($row){
                return route('admin.categories.destroy', $row->id);
            })
            ->make(true);
    }
}
