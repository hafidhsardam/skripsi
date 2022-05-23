@extends('template')
 
@section('title_PurReq', 'active')
 
@section('sidebar')
    @parent
@endsection
 
@section('title_')
<h5 id="form">Purchase Request</h5><br>
@endsection

@section('content')    
    <div class="shadow p-3 mb-5 bg-white rounded">
        <form method="post" action="{{route('PurchaseRequest.store')}}" id="dynamic_form">
        @csrf
        @method('PUT')
        <a href="#" onclick="history.back()" class="btn btn-success">Back</a>
        @if($pur_req->status == "Canceled")                
        <a href="{{route('PurchaseRequest.edit', $pur_req->id_purchase)}}" hidden class="btn btn-success">Edit</a>
        @elseif($pur_req->status == "In Process")
        <a href="{{URL::to('StoreRFQ', $pur_req->id_purchase)}}" class="btn btn-success">Create RFQ</a><br><br>
        @else
        <a href="{{route('PurchaseRequest.edit', $pur_req->id_purchase)}}" hidden class="btn btn-success">Edit</a>
        <a href="{{URL::to('quotations', $pur_req->id_purchase)}}" class="btn btn-success" hidden>Create RFQ</a><br><br>
        @endif
        <div class="container col-md-9">
            <div class="row">
                <div class="col-md-6">                    
                    <h2>{{$pur_req->id_purchase}}</h2>
                </div>         
                <div class="col-md-4">
                    <p>Status: {{$pur_req->status}}</p>
                </div>
                <div class="col-md-1">
                    <a href="{{URL::to('/invoice_PRS', $pur_req->id_purchase)}}" class="btn btn-success">Print</a>
                </div>
            </div><br>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="vendor">Vendor</label>
                        <select readonly class="form-control" name="vendor_id" id="vendor">
                        @foreach ($vendor as $vendors)
                            <option value="{{$vendors->id_vendor}}">{{$vendors->vendor_name}}</option>
                        @endforeach
                        </select>

                    </div>
                    <div class="col-md-6">
                        <label for="create_date">Create Date</label>
                        <input readonly value="{{$pur_req->created_at->format('Y-m-d')}}" class="form-control"type="date" name="create_date" id="create_date">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="notes">Notes</label>
                        <textarea name="notes" class="form-control" id="notes" cols="5" rows="5" readonly>{{$pur_req->notes}}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="order_date">Order Date</label>
                        <input readonly value="{{$pur_req->order_date}}" class="form-control"type="date" name="order_date" id="order_date">
                    </div>
                </div>
            </div>
        </div><br><br>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Description</th>
                    <th>Unit of Measure</th>
                    <th>Quantity</th>
                </tr>                    
            </thead>
            <tbody>
                @forelse($pur_prod as $vendorss) 
                    <tr>
                        <td><select readonly name="product_code" id="product_code" class="form-control">
                        
                            @foreach ($produk as $produks)
                                <option value="{{$produks->id_produk}}"
                                @if($vendorss->id_produk==$produks->id_produk) selected @endif >
                                {{$produks->nama_produk}}</option>
                            @endforeach</select>
                        </td>
                        <td><input readonly type="text" name="description" value="{{$vendorss->deskripsi}}" class="form-control" /></td>
                        <td><input readonly type="text" name="unit" value="{{$vendorss->unit}}" class="form-control" /></td>
                        <td><input readonly type="number" name="qty" value="{{$vendorss->qty}}" class="form-control" /></td>
                    </tr>
                    @empty
                    <div class="alert alert-danger">
                        Data Purchase Request belum Tersedia.
                    </div>
                @endforelse
            </tbody>
        </table>
    </form>
    <p>This data was created by {{$users->name}} on {{$users->created_at}}</p>
</div>
@endsection