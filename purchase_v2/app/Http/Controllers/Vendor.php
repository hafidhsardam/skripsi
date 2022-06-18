<?php

namespace App\Http\Controllers;

use App\Models\Vendor_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Vendor extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendor = Vendor_model::latest()->paginate(5);
        return view('vendor', compact('vendor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vendor = new Vendor_model();
        $vendor->vendor_name = $request->vendor_name;
        $vendor->address = $request->vendor_address;
        $vendor->phone = $request->phone;
        $vendor->email = $request->email;
        $vendor->type = $request->type;
        $vendor->save();
        return redirect()->route('Vendor.index')
        ->with('success','Vendor has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vendors = Vendor_model::find($id);
        return view('vendor_edit', compact('vendors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendors = Vendor_model::find($id);
        return view('vendor_edit', compact('vendors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vendor = Vendor_model::find($id);
        $vendor->vendor_name = $request->vendor_name;
        $vendor->address = $request->vendor_address;
        $vendor->phone = $request->phone;
        $vendor->email = $request->email;
        $vendor->type = $request->type;
        $vendor->update();
        return redirect()->route('Vendor.index')
        ->with('success','Vendor has been updated successfully.');
    }

    public function delete($id)
    {
        $vendor = Vendor_model::find($id);
        $vendor->delete();
        return redirect()->route('Vendor.index')
        ->with('success','Vendor has been deleted successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
