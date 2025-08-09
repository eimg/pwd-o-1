<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:sanctum");
    }

    public function index()
    {
        return Category::all();
    }

    public function store(Request $request)
    {
        $name = $request->name;
        if($name == "") {
            return response(['msg' => 'name required'], 400);
        }

        $category = new Category;
        $category->name = $name;
        $category->save();

        return $category;
    }

    public function show(Category $category)
    {
        return $category;
    }

    public function update(Request $request, Category $category)
    {
        $name = $request->name;
        if ($name == "") {
            return response(['msg' => 'name required'], 400);
        }

        $category->name = $name;
        $category->save();

        return $category;
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return $category;
    }
}
