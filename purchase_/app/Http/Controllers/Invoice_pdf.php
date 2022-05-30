<?php

namespace App\Http\Controllers;

use App\Models\PO_Controller;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class Invoice_pdf extends Controller
{    
    public function invoice_po($id)
    {
        $po = DB::table('purchase_orders')
        ->join('purchase_reqs', 'purchase_reqs.id_purchase','=','purchase_orders.id_purchase')
        ->join('purchase_prods', 'purchase_prods.id_purchase','=','purchase_orders.id_purchase')
        ->join('produk','produk.id_produk','=','purchase_prods.id_produk') 
        ->select('purchase_prods.price','purchase_prods.qty','deskripsi','nama_produk')       
        ->where('id_po', $id)->get();
        $vendor = DB::table('purchase_orders')
        ->join('purchase_reqs', 'purchase_reqs.id_purchase','=','purchase_orders.id_purchase')
        ->join('vendors','vendors.id_vendor','=','purchase_reqs.vendor_id')
        ->where('id_po', $id)->first();
        $data = [
            'title' => 'Purchase Orders Invoice',
            'date' => date('m/d/Y'),
            'id_po' => $id,
            'data_po' => $po,
            'data_vendor'   => $vendor
        ];
        $pdf = PDF::loadView('po_invoice', $data);
        return $pdf->download('po_invoice.pdf');
    }

    public function invoice_pr($id)
    {
        $pr = DB::table('purchase_reqs')
        ->join('purchase_prods', 'purchase_prods.id_purchase','=','purchase_reqs.id_purchase')
        ->join('produk','produk.id_produk','=','purchase_prods.id_produk')
        ->join('vendors','vendors.id_vendor','=','purchase_reqs.vendor_id')
        ->select('purchase_prods.price','purchase_prods.qty','deskripsi','nama_produk')
        ->where('purchase_reqs.id_purchase', $id)->get();
        $vendor = DB::table('purchase_reqs')
        ->join('vendors','vendors.id_vendor','=','purchase_reqs.vendor_id')
        ->where('id_purchase', $id)->first();
        $data = [
            'title' => 'Purchase Request Invoice',
            'date' => date('m/d/Y'),
            'id_purchase' => $id,
            'data_purchase' => $pr,
            'data_vendor'   => $vendor
        ];
        $pdf = PDF::loadView('pr_invoice', $data);
        return $pdf->download('pr_invoice.pdf');
    }
}
