<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{
    public function index()
    {
        return view('home');
    }


    public function search(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $purchase=DB::table('purchase_reqs')
            ->leftjoin('request_quotations','request_quotations.id_purchase','=','purchase_reqs.id_purchase')
            ->leftjoin('purchase_orders','purchase_orders.id_purchase','=','purchase_reqs.id_purchase')
            ->select('purchase_reqs.id_purchase','purchase_reqs.status','purchase_reqs.notes','purchase_reqs.created_at','purchase_reqs.order_date','id_po','id_quotation')
            ->where('purchase_reqs.id_purchase','LIKE','%'.$request->search."%")
            ->orwhere('id_po','LIKE','%'.$request->search."%")
            ->orwhere('id_quotation','LIKE','%'.$request->search."%")
            ->orwhere('purchase_reqs.order_date','LIKE','%'.$request->search."%")
            ->get();     
            if($purchase)
            {
                foreach ($purchase as $key => $purchase) {
                    $output.='<div class="col-md-3 card" style="margin:10px;" id="card">'.
                    '<h5 class="card-title">Kode Purchase: '.$purchase->id_purchase.'</h5>'.                    
                    '<h5 class="card-title">Kode PO: '.$purchase->id_po.'</h5>'.                    
                    '<h5 class="card-title">Kode RFQ: '.$purchase->id_quotation.'</h5>'.                    
                    '<p class="card-text">Status: '.$purchase->status.'</p>'.
                    '<p class="card-text">Notes: '.$purchase->notes.'</p>'.
                    '<p class="card-text">Order Date: '.$purchase->order_date.'</p>'.
                    '</div>';
                }
                return Response($output);
            }
            // $products=DB::table('produk')->where('nama_produk','LIKE','%'.$request->search."%")->get();
            // if($products)
            // {
            //     foreach ($products as $key => $product) {
            //         $output.='<div class="col-md-3 card" style="margin:10px;" id="card">'.
            //         '<h5 class="card-title">'.$product->nama_produk.'</h5>'.
            //         '<p class="card-text">Kode: '.$product->id_produk.'</p>'.
            //         '<p class="card-text">Stok: '.$product->stok.'</p>'.
            //         '<p class="card-text">Price: '.$product->price.'</p>'.
            //         '</div>';
            //     }
            //     return Response($output);
            // }else {
                
            // }            
        }
    }

}
