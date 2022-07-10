<?php

namespace App\Http\Controllers;

use App\Models\PO_Controller;
use App\Models\PurchaseRequest_Model;
use App\Models\RequestQuotation_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = DB::select("SELECT produk.nama_produk as nama_produk, SUM(purchase_prods.qty) as jumlah FROM `purchase_orders` INNER JOIN purchase_prods ON purchase_orders.id_purchase = purchase_prods.id_purchase INNER JOIN produk ON purchase_prods.id_produk = produk.id_produk WHERE purchase_orders.status = 'Received' GROUP BY purchase_prods.id_produk ORDER BY nama_produk ASC");

        if($items != null){
            foreach($items as $item){
                $formatted_label[] = ucwords($item->nama_produk);
                $formatted_value[] = $item->jumlah;
                $formatted_background = 'rgba(0, 0, 0, 1)';
            }
        } else {
            $formatted_label[] = [];
            $formatted_value[] = [];
            $formatted_background = [];
        }

        $chartjs = app()->chartjs
            ->name('barChart')
            ->type('bar')
            ->labels($formatted_label)
            ->datasets([
                [
                    'label' => 'Total Received Products',
                    'backgroundColor' => $formatted_background,
                    'data' => $formatted_value
                ]
            ])
            ->options([
                'maintainAspectRatio' => true,
                'scales'              => [
                    'xAxes' => [
                        [
                            'scaleLabel' => [
                                'display' => true,
                                'labelString' => 'Product Name',
                                'fontColor' => '#000',
                                'fontSize' => 30,
                                'fontStyle' => 'bolder'
                            ]
                        ]
                    ],
                    'yAxes' => [
                        [
                            'scaleLabel' => [
                                'display' => true,
                                'labelString' => 'Quantity Product',
                                'fontColor' => '#000',
                                'fontSize' => 25,
                                'fontStyle' => 'bolder'
                            ],
                            'ticks' => [
                                'stepSize' => 10
                            ],
                        ],
                    ],
                ],
                'responsive' => true,
                'legend' => [
                    'labels' => [
                        'fontSize' => 25,
                        'fontColor' => '#000',
                        'fontStyle' => 'bolder'
                    ]
                ]
            ]);

        $total_purchase = DB::select("SELECT produk.nama_produk as nama_produk, SUM(purchase_prods.price) as total FROM `purchase_orders` INNER JOIN purchase_prods ON purchase_orders.id_purchase = purchase_prods.id_purchase INNER JOIN produk ON purchase_prods.id_produk = produk.id_produk WHERE purchase_orders.status = 'Received' GROUP BY purchase_prods.id_produk ORDER BY nama_produk ASC");

        $tp = 0;
        if($total_purchase!=null){
            foreach($total_purchase as $total){
                $tp+=$total->total;
            }
        }

        $pr = PurchaseRequest_Model::count();
        $rfq = RequestQuotation_model::count();
        $po = PO_Controller::count();

        return view('home', compact('chartjs', 'tp', 'pr', 'rfq', 'po'));
    }
}
