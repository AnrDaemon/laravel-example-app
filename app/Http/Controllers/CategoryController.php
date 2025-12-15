<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Category::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category;
        $validator = $category->validate($request->only($category->getFillable()));
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $category->fill($validator->attributes())->save();
        return response()->json($category);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->mergeIfMissing($category->getAttributes());
        $validator = $category->validate($request->only($category->getFillable()));
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $category->update($validator->attributes());
        return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(['message' => 'Category deleted'], 204);
    }
}
