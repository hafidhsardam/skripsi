<?php

namespace App\Http\Controllers;

use App\Models\LogHistory;
use App\Models\PO_Controller;
use App\Models\RequestQuotation_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PurchaseOrder extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $po = DB::table('purchase_orders')
        ->join('purchase_reqs','purchase_reqs.id_purchase','=','purchase_orders.id_purchase')
        ->join('vendors', 'vendors.id_vendor','=','purchase_reqs.vendor_id')
        ->join('purchase_prods','purchase_prods.id_purchase','=','purchase_reqs.id_purchase')
        ->join('produk','produk.id_produk','=','purchase_prods.id_produk')
        ->select('id_po','vendor_name','purchase_reqs.created_at','purchase_orders.status',DB::raw('GROUP_CONCAT(nama_produk) as produk'))
        ->groupBy('id_po','vendor_name','purchase_reqs.created_at','status')
        ->orderBy('id_po', 'desc')
        ->paginate(5);
        return view('po', compact('po'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function getIdPurchase()
    {
        $new_id =  PO_Controller::get_idmax()->all();
        if ($new_id > 0) {
            foreach ($new_id as $key) {
                $auto_id = $key->id_po;              
            }
        }          
        return $id_po = PO_Controller::get_newid($auto_id,'PO'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $po = new PO_Controller();
        $po->id_po = $this->getIdPurchase();
        $po->id_purchase = $request->id_purchase;
        $po->status = 'Waiting Approval';
        $po->save();
        $affected = DB::table('request_quotations')
              ->where('id_purchase', $po->id_purchase)
              ->update(['status' => 'Created PO']);
        $log = new LogHistory();
        $log->id_data = $po->id_po;
        $log->status = 'Created Purchase Order';
        $log->id_user = Auth::user()->id_user;
        $log->save();
        return redirect()->route('PurchaseOrder.index')
        ->with('success','Purchase Order has been created successfully.');
    }

    public function received($id, Request $request)
    {
        $po = PO_Controller::find($id);
        $po->status = 'Received';
        if(!empty($request->file('dokumen'))) {
            $file = $request->file('dokumen');            
            $po->document = $file->getClientOriginalName();
            $tujuan_upload = 'dokumen';
            $file->move($tujuan_upload, $file->getClientOriginalName());
        }
        $po->save();
        $log = new LogHistory();
        $log->id_data = $id;
        $log->status = 'Updated Purchase Order';
        $log->id_user = Auth::user()->id_user;
        $log->save();
        return redirect()->route('PurchaseOrder.index')
        ->with('success','Purchase order has been received successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $po = DB::table('purchase_orders')
            ->join('purchase_reqs','purchase_orders.id_purchase', '=', 'purchase_reqs.id_purchase')
            ->join('vendors','vendors.id_vendor', '=', 'purchase_reqs.vendor_id')
            ->select('id_po','vendor_id', 'purchase_orders.id_purchase', 'purchase_orders.created_at', 'notes', 'purchase_orders.status', 'purchase_reqs.order_date')
            ->where('id_po', $id)->first();

        $users = DB::table('log_history')->join('users','users.id_user','=','log_history.id_user')
            ->where('id_data', $id)->first();

        $vendor = DB::table('vendors')->get();

        $produk = DB::table('produk')->get();

        $pos = DB::table('purchase_orders')
            ->join('purchase_reqs','purchase_orders.id_purchase', '=', 'purchase_reqs.id_purchase')
            ->join('purchase_prods','purchase_prods.id_purchase', '=', 'purchase_orders.id_purchase')
            ->select('*')
            ->where('id_po', $id)->get();

        return view('po_show', compact('po','pos','vendor','produk', 'users'));
    }
    
    public function cancel($id)
    {
        $po = PO_Controller::find($id);
        $po->status = 'Canceled';
        $po->save();

        $all = DB::table('purchase_orders')
        ->join('purchase_reqs','purchase_reqs.id_purchase','=','purchase_orders.id_purchase')
        ->join('request_quotations','request_quotations.id_purchase','=','purchase_orders.id_purchase')
        ->where('id_po', $id)
        ->update(array(
            'purchase_reqs.status'  => 'Canceled',
            'request_quotations.status'  => 'Canceled',
        ));

        $log = new LogHistory();
        $log->id_data = $id;
        $log->status = 'Updated Purchase Order';
        $log->id_user = Auth::user()->id_user;
        $log->save();

        return redirect()->route('PurchaseOrder.index')
        ->with('success','Purchase order has been canceled successfully.');
    }

    public function approved($id)
    {
        $po = PO_Controller::find($id);
        $po->status = 'Approved';
        $po->save();

        $all = DB::table('purchase_orders')
        ->join('purchase_reqs','purchase_reqs.id_purchase','=','purchase_orders.id_purchase')
        ->join('request_quotations','request_quotations.id_purchase','=','purchase_orders.id_purchase')
        ->where('id_po', $id)
        ->update(array(
            'purchase_reqs.status'  => 'Approved',
            'request_quotations.status'  => 'Approved',
        ));

        $log = new LogHistory();
        $log->id_data = $id;
        $log->status = 'Updated Purchase Order';
        $log->id_user = Auth::user()->id_user;
        $log->save();

        return redirect()->route('PurchaseOrder.index')
        ->with('success','Purchase order has been canceled successfully.');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    public function delete($id)
    {
        $po = PO_Controller::find('PO0001');
        $po->delete();
        return redirect()->route('PurchaseOrder.index')
        ->with('success','Purchase order has been deleted successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
