<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {

        $customers = Customer::all();

        return view('backoffice.customer.index', compact('customers'));
    }

    public function create()
    {

        return view('backoffice.customer.create');
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
            $customer = new Customer();
            $customer->name = $request->name;
            $customer->mobile_no = $request->mobile_no;
            $customer->email = $request->email;
            $customer->address = $request->address;
            $customer->created_by = Auth::user()->id;
            $customer->created_at = Carbon::now();
            $customer->save();

            flash()->success('Customer created successfully');
            return redirect()->route('customer.index');
        } catch (\Exception $exception) {
            flash()->error($exception->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $customer = Customer::findorfail($id);

        return view('backoffice.customer.edit', compact('customer'));
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
            $customer = Customer::findorfail($id);
            $customer->name = $request->name;
            $customer->mobile_no = $request->mobile_no;
            $customer->email = $request->email;
            $customer->address = $request->address;
            $customer->updated_by = Auth::user()->id;
            $customer->updated_at = Carbon::now();
            $customer->save();

            flash()->success('Customer Info Updated successfully');
            return redirect()->route('customer.index');
        } catch (\Exception $exception) {
            flash()->error($exception->getMessage());
            return redirect()->back()->withInput();
        }
    }



    public function show($id)
    {
        $supplier = Supplier::findorfail($id);

        return view('backoffice.customer.show', compact('supplier'));
    }

    public function delete($id)
    {


        try {
            $customer = Customer::findorfail($id);
            $customer->delete();

            flash()->success('Customer Info Deleted successfully');
            return redirect()->route('customer.index');
        } catch (\Exception $exception) {
            flash()->error($exception->getMessage());
            return redirect()->back()->withInput();
        }

    }
}