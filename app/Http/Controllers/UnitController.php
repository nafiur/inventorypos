<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    public function index()
    {

        $units = Unit::all();

        return view('backoffice.units.index', compact('units'));
    }

    public function create()
    {

        return view('backoffice.units.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:units,name',
        ], [
            'name.required' => 'Please provide a name.',
            'name.unique' => 'The name has already been Exists.',
        ]);


        try {
            $unit = new Unit();
            $unit->name = $request->name;
            $unit->created_by = Auth::user()->id;
            $unit->created_at = Carbon::now();
            $unit->save();

            flash()->success('Unit created successfully');
            return redirect()->route('unit.index');
        } catch (\Exception $exception) {
            flash()->error($exception->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $unit = Unit::findorfail($id);

        return view('backoffice.units.edit', compact('unit'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $validate = $request->validate([
            'name' => 'required|unique:units,name,' . $id,
        ], [
            'name.required' => 'Please provide a name.',
            'name.unique' => 'The name has already been taken.',
        ]);
        // dd($request->all());
        try {
            $unit = Unit::findorfail($id);
            $unit->name = $request->name;
            $unit->status = $request->status;
            $unit->updated_by = Auth::user()->id;
            $unit->updated_at = Carbon::now();
            $unit->save();

            flash()->success('Unit Updated successfully');
            return redirect()->route('unit.index');
        } catch (\Exception $exception) {
            flash()->error($exception->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function show($id)
    {
        $unit = Unit::findorfail($id);

        return view('backoffice.units.show', compact('unit'));
    }

    public function delete($id)
    {

        try {
            $unit = Unit::findorfail($id);
            $unit->delete();

            flash()->success('Unit Deleted successfully');
            return redirect()->route('unit.index');
        } catch (\Exception $exception) {
            flash()->error($exception->getMessage());
            return redirect()->back()->withInput();
        }

    }
}