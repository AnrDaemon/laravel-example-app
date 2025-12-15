<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json(Product::simplePaginate($request->input('per_page', 5))->appends($request->query()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();
        $data = $request->only($product->getFillable());
        $validator = $product->validate($data);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $product->fill($validator->attributes())->save();
        return response()->json($product);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->mergeIfMissing($product->getAttributes());
        $validator = $product->validate($request->only($product->getFillable()));
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $product->update($validator->attributes());
        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['message' => 'Product deleted'], 204);
    }
}
