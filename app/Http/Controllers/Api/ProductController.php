<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {

        $categoryId = $request->input('category_id');
        if ($categoryId) {
            $productIds = DB::table('category_product')->where('category_id', $categoryId)->pluck('product_id');

            $products = Product::with('categories')->whereIn('id', $productIds)->where('availability', 1)->get();
        } else {
            $products = Product::with('categories')->where('availability', 1)->get();
        }
        return response()->json(ProductResource::collection($products), 200);
    }
}
