@extends('templateWithOutSearch')
 
@section('title_RFQ', 'active')
 
@section('sidebar')
    @parent
@endsection

@section('title_')
<h5 id="form">Request for Quotation</h5><br>
@endsection

@section('content')    
<div class="shadow p-3 mb-5 bg-white rounded">
        <form method="post" action="{{route('PurchaseOrder.store')}}" id="dynamic_form">
            <input type="text" hidden name="id_purchase" id="id_purchase" value="{{$qr->id_purchase}}">
        @csrf
        <!-- @method('PUT')         -->
        <a href="{{route('RequestQuotations.index')}}" class="btn btn-success">Back</a>
        @if($qr->status == 'Approved')
        <button type="submit" class="btn btn-success">Create PO</button><br><br>
        @elseif(Auth::user()->level == 'admin'&&$qr->status == 'Waiting Approval')
        <a href="{{route('RequestQuotations.edit', $qr->id_quotation)}}" class="btn btn-success">Approved</a>
        @endif

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        
        <div class="container col-md-9"><br>
            <div class="row">
                <div class="col-md-4">                    
                    <h2>{{$qr->id_quotation}}</h2>
                </div>         
                <div class="col-md-4">
                    <p>Status: {{$qr->status}}</p>
                </div>
                <div class="col-md-4">
                    <a href="{{URL::to('/rfq_invoice', $qr->id_quotation)}}" class="btn btn-success">Print</a>
                    <a href="{{URL::to('/send_email/'.$qr->id_purchase)}}" class="btn btn-success">Sent Email</a>
                </div>
            </div><br>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="vendor">Vendor</label>
                        <select readonly class="form-control" name="vendor_id" id="vendor">
                        @foreach ($vendor as $vendors)
                            <option value="{{$vendors->id_vendor}}"
                                @if($qr->id_vendor==$vendors->id_vendor) selected @endif >
                                {{$vendors->vendor_name}}</option>
                        @endforeach
                        </select>

                    </div>
                    <div class="col-md-6">
                        <label for="create_date">Create Date</label>
                        <input readonly value="{{Carbon\Carbon::parse($qr->created_at)->format('Y-m-d')}}" class="form-control"type="date" name="create_date" id="create_date">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="notes">Notes</label>
                        <textarea readonly value = "true" class="form-control"type="text" name="notes" id="notes" cols="5" rows="5">  {{$qr->notes}}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="order_date">Order Date</label>
                        <input readonly value="{{$qr->order_date}}" class="form-control"type="date" name="order_date" id="order_date">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="notes">Source Document</label>
                        <input readonly value = "{{$qr->id_purchase}}" class="form-control"type="text" name="notes" id="notes" >  
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
                    <th>Unit Price</th>
                    <th>Subtotal</th>
                </tr>                    
            </thead>
            <tbody>
            <?php $total = 0; ?>
                @forelse($apalah as $vendorss) 
                    <tr>
                        <td><select readonly name="product_code" id="product_code" class="form-control">
                        
                            @foreach ($produk as $produks)
                                <option value="{{$produks->id_produk}}"
                                @if($vendorss->id_produk==$produks->id_produk) selected @endif >
                                {{$produks->nama_produk}}</option>
                            @endforeach</select>
                        </td>
                        <?php $total += $vendorss->price; ?>
                        <td><input readonly type="text" name="description" value="{{$vendorss->deskripsi}}" class="form-control" /></td>
                        <td><input readonly type="text" name="unit" value="{{$vendorss->unit}}" class="form-control" /></td>
                        <td><input readonly type="number" name="qty" value="{{$vendorss->qty}}" class="form-control" /></td>
                        <td><input readonly type="text" name="priceEach" value="{{$vendorss->priceEach}}" class="form-control" /></td>
                        <td><input readonly type="number" name="price" value="{{$vendorss->price}}" class="form-control" /></td>
                    </tr>
                    @empty
                    <div class="alert alert-danger">
                        Data Purchase Request belum Tersedia.
                    </div>
                @endforelse
                    <tr >
                        <td colspan="3">Total: Rp. {{$total}}</td>
                    </tr>
            </tbody>
        </table>
    </form>
    <p>This data was created </p>
</div>
@endsection