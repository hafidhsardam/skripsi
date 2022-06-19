<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MailController extends Controller {
   private $vendor;

   public function send($id) {

      $purchase_reqs = DB::table("purchase_reqs")->where("id_purchase",$id)->first();
      $purchase_prods = DB::table("purchase_prods")->leftJoin('produk', 'purchase_prods.id_produk', '=', 'produk.id_produk')->where("id_purchase",$id)->get();
      $purchase_orders = DB::table("purchase_orders")->where("id_purchase",$id)->first();
      $this->vendor = DB::table("vendors")->where("id_vendor",$purchase_reqs->vendor_id)->first();

      $data = [
         "purchase_reqs" => $purchase_reqs,
         "purchase_prods" => $purchase_prods,
         "purchase_orders" => $purchase_orders,
         "vendor" => $this->vendor,
      ];

      Mail::send('mail', $data, function($message) {
         $message->to($this->vendor->email)->subject
            ('Purchase Order Information');
         $message->from($this->vendor->email,'Purchase Order');
      });

      return redirect()->back()->with('success', 'Success send email');
   }
}