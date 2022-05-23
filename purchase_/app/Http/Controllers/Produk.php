<?php

namespace App\Http\Controllers;

use App\Models\Produk_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Produk extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Produk_model::latest()->paginate(5);        
        return view('produk', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produk_create');
    }

    public function getIdPurchase()
    {
        $new_id =  Produk_model::get_idmax()->all();
        if ($new_id > 0) {
            foreach ($new_id as $key) {
                $auto_id = $key->id_produk;              
            }
        }          
        return $id_produk = Produk_model::get_newid($auto_id,'PB'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produk = new Produk_model();
        $produk->id_produk = $this->getIdPurchase();
        $produk->nama_produk = $request->nama;
        $produk->stok = $request->stok;
        $produk->price = $request->price;
        $produk->type = $request->type;
        $produk->save();
        return redirect()->route('Produk.index')
        ->with('success','Product has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = Produk_model::find($id);        
        return view('produk_edit', compact('produk'));
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
        $produk = Produk_model::find($id);
        $produk->nama_produk = $request->nama;
        $produk->stok = $request->stok;
        $produk->price = $request->price;
        $produk->type = $request->type;
        $produk->save();
        return redirect()->route('Produk.index')
        ->with('success','Product has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $produk = Produk_model::find($id);
        $produk->delete();
        return redirect()->route('Produk.index')
        ->with('success','Product has been deleted successfully.');
    }
    
    public function destroy($id)
    {
        $produk = Produk_model::find($id);
        $produk->delete();
        return redirect()->route('Produk.index')
        ->with('success','Product has been deleted successfully.');
    }
}
