<?php

namespace App\Http\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class CategoriesComposer
{
    public function compose(View $view)
    {
        return $view->with('sidebarCategories', Category::with(['posts' => function ($query) {
            $query->published();
        }])->orderBy('title')->get());
    }
}
