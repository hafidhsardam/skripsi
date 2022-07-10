@extends('template')

@section('title_Dashboard', 'active')

@section('sidebar')
    @parent
@endsection

@section('content')
    <style>
        .card-box {
            position: relative;
            color: #fff;
            padding: 20px 10px 40px;
            margin: 20px 0px;
        }

        .card-box:hover {
            text-decoration: none;
            color: #f1f1f1;
        }

        .card-box:hover .icon i {
            font-size: 100px;
            transition: 1s;
            -webkit-transition: 1s;
        }

        .card-box .inner {
            padding: 5px 10px 0 10px;
        }

        .card-box h3 {
            font-size: 27px;
            font-weight: bold;
            margin: 0 0 8px 0;
            white-space: nowrap;
            padding: 0;
            text-align: left;
        }

        .card-box p {
            font-size: 15px;
        }

        .card-box .icon {
            position: absolute;
            top: auto;
            bottom: 5px;
            right: 5px;
            z-index: 0;
            font-size: 72px;
            color: rgba(255, 255, 255, 0.15);
        }

        .card-box .card-box-footer {
            position: absolute;
            left: 0px;
            bottom: 0px;
            text-align: center;
            padding: 3px 0;
            color: rgba(255, 255, 255, 0.8);
            background: rgba(0, 0, 0, 0.1);
            width: 100%;
            text-decoration: none;
        }

        .card-box:hover .card-box-footer {
            background: rgba(0, 0, 0, 0.3);
        }

        .bg-blue {
            background-color: #00c0ef !important;
        }

        .bg-green {
            background-color: #00a65a !important;
        }

        .bg-orange {
            background-color: #f39c12 !important;
        }

        .bg-red {
            background-color: #d9534f !important;
        }

        .bg-black {
            background-color: black !important;
        }
    </style>


    <h5 id="form">Dashboard</h5><br>
    <div class="mb-5 bg-white">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="card-box bg-black">
                    <div class="inner">
                        <h3> {{ $pr ?? "0" }} </h3>
                        <p> Purchase Request </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </div>
                    <a href="{{ route('PurchaseRequest.index') }}" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="card-box bg-black">
                    <div class="inner">
                        <h3> {{ $rfq ?? "0" }} </h3>
                        <p> Request for Quotations </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-clone" aria-hidden="true"></i>
                    </div>
                    <a href="{{ route('RequestQuotations.index') }}" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="card-box bg-black">
                    <div class="inner">
                        <h3> {{ $po ?? "0" }} </h3>
                        <p> Purchase Order </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                    </div>
                    <a href="{{ route('PurchaseOrder.index') }}" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="p-3 mb-5 bg-white rounded" style="border: 3px solid black">
        <h4 class="mb-0 font-weight-bolder">
            Total Purchase Cost: @currency($tp)
        </h4>
    </div>
    <div class="p-3 mb-5 bg-white rounded" style="border: 3px solid black">
        {!! $chartjs->render() !!}
    </div>
@endsection
