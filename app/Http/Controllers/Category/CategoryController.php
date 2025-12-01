<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Service\Category\CategoryService;
use App\Utils\General\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct(private readonly CategoryService $categoryService) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();

        return ApiResponse::statusOk($category);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {

        $this->categoryService->save(new Category(), $request);

        return ApiResponse::statusCreated();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $this->categoryService->save($category, $request);

        return ApiResponse::statusOk();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $this->categoryService->delete($category);

        return ApiResponse::statusDeleted();
    }
}
