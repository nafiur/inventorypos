<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function PurchaseAll()
    {

        $allData = Purchase::orderBy('date', 'desc')->orderBy('id', 'desc')->get();

        return view('backoffice.purchase.index', compact('allData'));

    } // End Method


    public function PurchaseCreate()
    {

        $suppliers = Supplier::all();
        $units = Unit::all();
        $categories = ProductCategory::all();

        return view('backoffice.purchase.create', compact('suppliers', 'units', 'categories'));

    } // End Method


    public function PurchaseStore(Request $request)
    {

        if ($request->category_id == null) {

            flash()->error($exception->getMessage());
            return redirect()->back()->withInput();
        } else {

            $count_category = count($request->category_id);
            for ($i = 0; $i < $count_category; $i++) {
                $purchase = new Purchase();
                $purchase->date = date('Y-m-d', strtotime($request->date[$i]));
                $purchase->purchase_no = $request->purchase_no[$i];
                $purchase->supplier_id = $request->supplier_id[$i];
                $purchase->category_id = $request->category_id[$i];

                $purchase->product_id = $request->product_id[$i];
                $purchase->buying_qty = $request->buying_qty[$i];
                $purchase->unit_price = $request->unit_price[$i];
                $purchase->buying_price = $request->buying_price[$i];
                $purchase->description = $request->description[$i];

                $purchase->created_by = Auth::user()->id;
                $purchase->status = '0';
                $purchase->save();
            } // end foreach
        } // end else

        flash()->success('Product created successfully');
        return redirect()->route('purchase.all');
    } // End Method


    public function PurchaseDelete($id)
    {

        Purchase::findOrFail($id)->delete();

        flash()->success('Product created successfully');
        return redirect()->route('purchase.all');

    } // End Method


    public function PurchasePending()
    {

        $allData = Purchase::orderBy('date', 'desc')->orderBy('id', 'desc')->where('status', '0')->get();

        return view('backoffice.purchase.pending', compact('allData'));

    }// End Method


    public function PurchaseApprove($id)
    {

        $purchase = Purchase::findOrFail($id);
        $product = Product::where('id', $purchase->product_id)->first();
        $purchase_qty = ((float)($purchase->buying_qty)) + ((float)($product->quantity));
        $product->quantity = $purchase_qty;

        if($product->save()) {

            Purchase::findOrFail($id)->update([
                'status' => '1',
            ]);

            flash()->success('Product created successfully');

            return redirect()->route('purchase.all');

        }

    }// End Method


    public function DailyPurchaseReport()
    {
        return view('backoffice.purchase.daily_purchase_report');
    }// End Method


    public function DailyPurchasePdf(Request $request)
    {

        $sdate = date('Y-m-d', strtotime($request->start_date));
        $edate = date('Y-m-d', strtotime($request->end_date));
        $allData = Purchase::whereBetween('date', [$sdate,$edate])->where('status', '1')->get();


        $start_date = date('Y-m-d', strtotime($request->start_date));
        $end_date = date('Y-m-d', strtotime($request->end_date));
        return view('backoffice.pdf.daily_purchase_report_pdf', compact('allData', 'start_date', 'end_date'));
    }// End Method
}