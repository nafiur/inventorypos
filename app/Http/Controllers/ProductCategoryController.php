<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;

class ProductCategoryController extends Controller
{
    public function index()
    {

        $categories = ProductCategory::all();

        return view('backoffice.product_category.index', compact('categories'));
    }

    public function create()
    {

        return view('backoffice.product_category.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:product_categories,name',
        ], [
            'name.required' => 'Please provide a name.',
            'name.unique' => 'The name has already been Exists.',
        ]);


        try {
            $category = new ProductCategory();
            $category->name = $request->name;
            $category->created_by = Auth::user()->id;
            $category->created_at = Carbon::now();
            $category->save();

            flash()->success('Unit created successfully');
            return redirect()->route('product.category.index');
        } catch (\Exception $exception) {
            flash()->error($exception->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $category = ProductCategory::findorfail($id);

        return view('backoffice.product_category.edit', compact('category'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $validate = $request->validate([
            'name' => 'required|unique:product_categories,name,' . $id,
        ], [
            'name.required' => 'Please provide a name.',
            'name.unique' => 'The name has already been taken.',
        ]);
        // dd($request->all());
        try {
            $category = ProductCategory::findorfail($id);
            $category->name = $request->name;
            $category->status = $request->status;
            $category->updated_by = Auth::user()->id;
            $category->updated_at = Carbon::now();
            $category->save();

            flash()->success('Category Updated successfully');
            return redirect()->route('product.category.index');
        } catch (\Exception $exception) {
            flash()->error($exception->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function show($id)
    {
        $category = ProductCategory::findorfail($id);

        return view('backoffice.product_category.show', compact('category'));
    }

    public function delete($id)
    {

        try {
            $category = ProductCategory::findorfail($id);
            $category->delete();

            flash()->success('Category Deleted successfully');
            return redirect()->route('product.category.index');
        } catch (\Exception $exception) {
            flash()->error($exception->getMessage());
            return redirect()->back()->withInput();
        }

    }
}