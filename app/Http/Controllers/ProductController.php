<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Unit;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {

        $products = Product::all();

        return view('backoffice.product.index', compact('products'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        $categories = ProductCategory::all();
        $units = Unit::all();

        return view('backoffice.product.create', compact('suppliers', 'categories', 'units'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'unit_id' => 'required',
            'supplier_id' => 'required',
            'product_category_id' => 'required',
            'quantity' => 'required',
        ], [
            'name.required' => 'Please provide a name.',
            'supplier_id.required' => 'Please Select Supplier.',
            'product_category_id.required' => 'Please Select Product Category.',
            'quantity.required' => 'Please provide Quantity.',
        ]);


        try {
            $product = new Product();
            $product->name = $request->name;
            $product->unit_id = $request->unit_id;
            $product->supplier_id = $request->supplier_id;
            $product->product_category_id = $request->product_category_id;
            $product->quantity = $request->quantity;
            $product->created_by = Auth::user()->id;
            $product->created_at = Carbon::now();
            $product->save();

            flash()->success('Product created successfully');
            return redirect()->route('product.index');
        } catch (\Exception $exception) {
            flash()->error($exception->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $product = Product::findorfail($id);
        $suppliers = Supplier::all();
        $categories = ProductCategory::all();
        $units = Unit::all();

        return view('backoffice.product.edit', compact('product', 'suppliers', 'categories', 'units'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $validate = $request->validate([
            'name' => 'required',
            'unit_id' => 'required',
            'supplier_id' => 'required',
            'product_category_id' => 'required',
            'quantity' => 'required',
        ], [
            'name.required' => 'Please provide a name.',
            'supplier_id.required' => 'Please Select Supplier.',
            'product_category_id.required' => 'Please Select Product Category.',
            'quantity.required' => 'Please provide Quantity.',
        ]);

        try {
            $product = Product::findorfail($id);
            $product->name = $request->name;
            $product->unit_id = $request->unit_id;
            $product->supplier_id = $request->supplier_id;
            $product->product_category_id = $request->product_category_id;
            $product->quantity = $request->quantity;
            $product->updated_by = Auth::user()->id;
            $product->updated_at = Carbon::now();
            $product->save();

            flash()->success('Product Updated successfully');
            return redirect()->route('product.index');
        } catch (\Exception $exception) {
            flash()->error($exception->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function show($id)
    {
        $product = Product::findorfail($id);

        return view('backoffice.product.show', compact('product'));
    }

    public function delete($id)
    {

        try {
            $product = Product::findorfail($id);
            $product->delete();

            flash()->success('Product Deleted successfully');
            return redirect()->route('product.index');
        } catch (\Exception $exception) {
            flash()->error($exception->getMessage());
            return redirect()->back()->withInput();
        }

    }
}