<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    public function index()
    {

        $suppliers = Supplier::all();

        return view('backoffice.supplier.index', compact('suppliers'));
    }

    public function create()
    {

        return view('backoffice.supplier.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'mobile_no' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ], [
            'name.required' => 'Please provide a name.',
            'mobile_no.required' => 'Please provide a phone number.',
            'email.required' => 'Please provide an email address.',
            'email.email' => 'Please provide a valid email address.',
            'address.required' => 'Please provide an address.',
        ]);

        try {
            $supplier = new Supplier();
            $supplier->name = $request->name;
            $supplier->mobile_no = $request->mobile_no;
            $supplier->email = $request->email;
            $supplier->address = $request->address;
            $supplier->created_by = Auth::user()->id;
            $supplier->created_at = Carbon::now();
            $supplier->save();

            flash()->success('Supplier created successfully');
            return redirect()->route('supplier.index');
        } catch (\Exception $exception) {
            flash()->error($exception->getMessage());
            return redirect()->back()->withInput();
        }
    }
    public function edit($id)
    {
        $supplier = Supplier::findorfail($id);

        return view('backoffice.supplier.edit', compact('supplier'));
    }
    public function update(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'mobile_no' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ], [
            'name.required' => 'Please provide a name.',
            'mobile_no.required' => 'Please provide a phone number.',
            'email.required' => 'Please provide an email address.',
            'email.email' => 'Please provide a valid email address.',
            'address.required' => 'Please provide an address.',
        ]);
        $id = $request->id;
        try {
            $supplier = Supplier::findorfail($id);
            $supplier->name = $request->name;
            $supplier->mobile_no = $request->mobile_no;
            $supplier->email = $request->email;
            $supplier->address = $request->address;
            $supplier->updated_by = Auth::user()->id;
            $supplier->updated_at = Carbon::now();
            $supplier->save();

            flash()->success('Supplier Info Updated successfully');
            return redirect()->route('supplier.index');
        } catch (\Exception $exception) {
            flash()->error($exception->getMessage());
            return redirect()->back()->withInput();
        }
    }


}