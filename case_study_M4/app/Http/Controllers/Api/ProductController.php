<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;


class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return ProductResource::collection($products);
        // return response()->json($products);
    }

    public function show($id)
    {
        $product = Product::find($id);

        if ($product) {
             return response()->json(['data' => $product], 200);
        } else {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        // Tìm kiếm sản phẩm dựa trên keyword trong cột "name"
        $products = Product::where('name', 'like', '%' . $keyword . '%')->get();
    
        // Trả về dữ liệu dưới dạng JSON
        return response()->json($products, 200);
    }
}