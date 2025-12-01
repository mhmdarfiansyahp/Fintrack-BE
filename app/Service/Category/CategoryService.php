<?php

namespace App\Service\Category;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryService
{

    public function save(Category $category, Request $request): void
    {
        $category->name = $request->input('name');
        $category->type = $request->input('type');
        $category->save();
    }

    public function delete(Category $category): void
    {
        $category->delete();
    }
}
