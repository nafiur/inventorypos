<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

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



        return redirect()->route('supplier.index');
    }


}
