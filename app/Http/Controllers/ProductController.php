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
        $q = $request->input("q");
        $category_id = $request->input("category_id");
        $rating_from = $request->input("rating_from");
        $price_from = $request->input("price_from");
        $price_to = $request->input("price_to");
        $in_stock = \filter_var($request->input("in_stock"), \FILTER_VALIDATE_BOOL, \FILTER_NULL_ON_FAILURE);
        $qb = Product::query();

        if ($q) {
            $qb->where("name", "LIKE", "%{$q}%");
        }

        if ($price_from) {
            $qb->where("price", ">=", $price_from);
        }
        if ($price_to) {
            $qb->where("price", "<=", $price_to);
        }

        if ($category_id) {
            $cid = $category_id;
            if (!is_array($cid)) {
                $cid = array_filter(explode(",", $cid), fn($e) => $e > 0);
            }
            $cid = array_values($cid);
            $qb->whereIn("category_id", $cid);
        }

        if ($rating_from) {
            $qb->where("rating", ">=", $rating_from);
        }

        if (isset($in_stock)) {
            $qb->where("in_stock", "=", $in_stock ? 1 : 0);
        }

        if ($request->input("sort")) {
            $qb = match ($request->input("sort")) {
                "price_asc" => $qb->orderBy("price", "ASC"),
                "price_desc" => $qb->orderBy("price", "DESC"),
                "rating_desc" => $qb->orderBy("rating", "DESC"),
                "newest"  => $qb->orderBy("updated_at", "DESC"),
            };
        }

        return response()->json($qb->simplePaginate($request->input('per_page', 5))->appends($request->all()));
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
