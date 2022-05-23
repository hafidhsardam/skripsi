<?php

namespace App\Http\Controllers;

use App\Models\LogHistory;
use App\Models\PurchaseProduct_Model;
use App\Models\PurchaseRequest_Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PurchaseRequest extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pur_req = DB::table('purchase_reqs')
        ->join('vendors','vendors.id_vendor', '=', 'purchase_reqs.vendor_id')
        ->join('purchase_prods','purchase_prods.id_purchase','=','purchase_reqs.id_purchase')
        ->join('produk','produk.id_produk','=','purchase_prods.id_produk')
        ->select('purchase_reqs.id_purchase', DB::raw('GROUP_CONCAT(nama_produk) as produk'),'vendor_name','purchase_reqs.created_at','status')
        ->groupBy('purchase_reqs.id_purchase','vendor_name','purchase_reqs.created_at','status')
        ->where('quotations','n')
        ->orderBy('purchase_reqs.id_purchase', 'desc')
        ->paginate(5);
        // $pur_req = DB::table('purchase_reqs')
        //     ->join('vendors','vendors.id_vendor', '=', 'purchase_reqs.vendor_id')
        //     ->select('*')
        //     ->where('quotations','n')
        //     ->orderBy('id_purchase', 'asc')
        //     ->paginate(5);
        // $pur_req = Purchase_req::first()->orderBy('id_purchase', 'asc')->paginate(5);
        return view('pr', compact('pur_req'));
    }

    public function getIdPurchase()
    {
        $new_id =  PurchaseRequest_Model::get_idmax()->all();
        if ($new_id > 0) {
            foreach ($new_id as $key) {
                $auto_id = $key->id_purchase;              
            }
        }          
        return $id_purchase = PurchaseRequest_Model::get_newid($auto_id,'PR'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendor = DB::table('vendors')->get();
        $produk = DB::table('produk')->get();
        return view('pr_create', compact('vendor','produk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $purchase = new PurchaseRequest_Model();
        $purchase->vendor_id = $request->vendor_id;
        if(!empty($request->notes)){
            $purchase->notes = $request->notes;
        }
        $purchase->order_date = $request->order_date;
        $purchase->status = 'In Process';
        $id = $this->getIdPurchase();
        $purchase->id_purchase = $id;        
        $purchase->save();
        $prod_id = $request->product_code;
        $unit = $request->unit;
        $qty = $request->qty;
        $description = $request->description;
        for ($count=0; $count < count($prod_id); $count++) {
            $data = array(
                'id_purchase'   => $id,
                'id_produk' => $prod_id[$count],
                'qty'  => $qty[$count],
                'deskripsi' => $description[$count],
                'unit' => $unit[$count],
            );
            PurchaseProduct_Model::insert($data);
        }
        $log = new LogHistory();
        $log->id_data = $id;
        $log->status = 'Created Purchase Request';
        $log->id_user = Auth::user()->id_user;
        $log->save();
        return redirect()->route('PurchaseRequest.index')
        ->with('success','Purchase request has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pur_req = PurchaseRequest_Model::find($id);
        $pur_prod = PurchaseProduct_Model::where('id_purchase',$id)->get();
        $vendor = DB::table('vendors')->get();
        $produk = DB::table('produk')->get();
        $users = DB::table('log_history')->join('users','users.id_user','=','log_history.id_user')
            ->where('id_data', $id)->first();
        return view('pr_show', compact('pur_req','vendor','produk','pur_prod', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pur_req = PurchaseRequest_Model::find($id);
        $pur_prod = PurchaseProduct_Model::where('id_purchase',$id)->get();
        $vendor = DB::table('vendors')->get();
        $produk = DB::table('produk')->get();
        return view('pr_edit', compact('pur_req','vendor','produk','pur_prod'));
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
        $purchase = PurchaseRequest_Model::find($id);
        $purchase->vendor_id = $request->vendor_id;
        if(!empty($request->notes)){
            $purchase->notes = $request->notes;
        }
        $purchase->order_date = $request->order_date;
        $purchase->save();
        $prod_id = $request->product_code;
        $qty = $request->qty;
        $description = $request->description;
        $unit = $request->unit;
        for ($count=0; $count < count($prod_id); $count++) {
            $idd = DB::table('purchase_prods')->where('id_purchase',$id)->where('id_produk', $prod_id[$count])->get();
            if ($qty[$count] == 0) {
                DB::table('purchase_prods')->where('id_purchase',$id)->where('id_produk', $prod_id[$count])->delete();
            }
            $data = array(
                'qty'  => $qty[$count],
                'deskripsi' => $description[$count],
                'unit' => $unit[$count],
            );
            if (!empty($idd->id_produk)) {                
                DB::table('purchase_prods')->where('id_purchase',$id)->where('id_produk', $prod_id[$count])->update($data);
            }else{
                $data = array(
                    'id_purchase' => $id,
                    'id_produk'   => $prod_id[$count],
                    'qty'  => $qty[$count],
                    'deskripsi' => $description[$count],
                    'unit' => $unit[$count],
                );
                DB::table('purchase_prods')->where('id_purchase',$id)->where('id_produk', $prod_id[$count])->delete();
                PurchaseProduct_Model::insert($data);
            }
        }
        $log = new LogHistory();
        $log->id_data = $id;
        $log->status = 'Updated Purchase Request';
        $log->id_user = Auth::user()->id_user;
        $log->save();
        return redirect()->route('PurchaseRequest.index')
        ->with('success','Purchase request has been updated successfully.');
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
