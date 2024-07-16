<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function GetCategory(Request $request)
    {

        $supplier_id = $request->supplier_id;
        // dd($supplier_id);
        $allCategory = Product::with(['category'])->select('product_category_id')->where('supplier_id', $supplier_id)->groupBy('product_category_id')->get();
        return response()->json($allCategory);
    } // End Mehtod

    public function GetProduct(Request $request)
    {

        $product_category_id = $request->product_category_id;
        $allProduct = Product::where('product_category_id', $product_category_id)->get();
        return response()->json($allProduct);
    } // End Mehtod


    public function GetStock(Request $request)
    {
        $product_id = $request->product_id;
        $stock = Product::where('id', $product_id)->first()->quantity;
        return response()->json($stock);

    } // End Mehtod
}