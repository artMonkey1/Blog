<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends FrontendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate();

        return view('categories.index', compact('categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
       dd( $posts = $category->posts()->with('author')->published()->paginate());

        return view('categories.show', compact('category', 'posts'));
    }
}
