<?php

namespace App\Http\Controllers;

use App\Models\LogHistory;
use App\Models\PurchaseProduct_Model;
use App\Models\PurchaseRequest_Model;
use App\Models\RequestQuotation_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RequestQuotation extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pur_req = DB::table('request_quotations')
            ->join('purchase_reqs', 'purchase_reqs.id_purchase', '=', 'request_quotations.id_purchase')
            ->join('vendors','vendors.id_vendor', '=', 'purchase_reqs.vendor_id')
            ->join('purchase_prods','purchase_prods.id_purchase','=','purchase_reqs.id_purchase')
            ->join('produk','produk.id_produk','=','purchase_prods.id_produk')
            ->select('id_quotation','request_quotations.id_purchase',DB::raw('GROUP_CONCAT(nama_produk) as produk'),'vendor_name','purchase_reqs.created_at','request_quotations.status')
            // ->orderBy('purchase_reqs.id_purchase', 'asc')
            ->orderBy('id_quotation', 'desc')
            ->groupBy('id_quotation','vendor_name','request_quotations.id_purchase','purchase_reqs.created_at','request_quotations.status')
            ->paginate(5);
        return view('qr', compact('pur_req'));
    }

    public function getIdPurchase()
    {
        $new_id =  RequestQuotation_model::get_idmax()->all();
        if ($new_id > 0) {
            foreach ($new_id as $key) {
                $auto_id = $key->id_quotation;              
            }
        }  
        
        return $id_purchase = RequestQuotation_model::get_newid($auto_id,'RFQ'); 
    }

    public function StoreRFQ($id)
    {
        $rq = new RequestQuotation_model();
        $pr = PurchaseRequest_Model::find($id);
        $rq->id_purchase = $id;
        $rq->id_quotation = $this->getIdPurchase();
        $rq->status = 'Waiting Approval';
        $pr->status = 'Waiting Approval';
        $pr->quotations = 'y';
        $pr->save();
        $rq->save();
        $log = new LogHistory();
        $log->id_data = $rq->id_quotation;
        $log->status = 'Created Request Quotation';
        $log->id_user = Auth::user()->id_user;
        $log->save();
        return redirect()->route('RequestQuotations.index')
        ->with('success','Request Quotation has been created successfully.');
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $qr = DB::table('request_quotations')
            ->join('purchase_reqs', 'purchase_reqs.id_purchase', '=', 'request_quotations.id_purchase')
            ->join('vendors','vendors.id_vendor', '=', 'purchase_reqs.vendor_id')
            ->join('purchase_prods', 'purchase_prods.id_purchase','=','purchase_reqs.id_purchase')
            ->select('id_quotation','id_produk','request_quotations.id_purchase','id_vendor','notes','purchase_reqs.order_date','vendor_name','purchase_reqs.created_at','request_quotations.status')
            ->where('id_quotation', $id)
            ->first();
        $produk = DB::table('produk')->get();
        $vendor = DB::table('vendors')->get();
        $users = DB::table('log_history')->join('users','users.id_user','=','log_history.id_user')
            ->where('id_data', $id)->first();
        $apalah = DB::table('request_quotations')
            ->join('purchase_reqs', 'purchase_reqs.id_purchase', '=', 'request_quotations.id_purchase')
            ->join('purchase_prods', 'purchase_prods.id_purchase','=','purchase_reqs.id_purchase')
            ->where('id_quotation', $id)->get();
        // $qr = RequestQuotation_model::find($id);
        return view('qr_show', compact('qr','produk','apalah','vendor','users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $qr = RequestQuotation_model::find($id);
        $qr->status = 'Approved';
        $qr->save();
        return redirect()->route('RequestQuotations.index')
        ->with('success','Request Quotation has been updated successfully.');
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
