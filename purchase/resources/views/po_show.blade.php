@extends('templateWithOutSearch')

@section('title_PO', 'active')

@section('sidebar')
    @parent
@endsection

@section('title_')
<h5 id="form">Purchase Order </h5><br>
@endsection

@section('content')
    <div class="shadow p-3 mb-5 bg-white rounded">
        <form method="post" action="{{URL::to('received', $po->id_po)}}" id="dynamic_form" enctype="multipart/form-data">
        @csrf
        <!-- @method('PUT') -->
        <a href="#" onclick="history.back()" class="btn btn-success">Back</a>
        
        @if (Auth::user()->level == 'admin')
            @if($po->status=='Waiting Approval')
            <a href="{{URL::to('cancel', $po->id_po)}}" class="btn btn-success">Cancel PO</a>
            <a href="{{URL::to('approved', $po->id_po)}}" class="btn btn-success">Approved</a>
        @elseif($po->status=='Canceled')
            @method('DELETE')
            <a href="{{URL::to('/delete', $po->id_po)}}" class="btn btn-success">Delete</a>
            @elseif($po->status=='Received' || $po->status=='Deleted')


            @elseif($po->status=='Approved')
            <button type="submit" class="btn btn-success">Received</button>
            @endif
        @endif

        @if (Auth::user()->level == 'user')
          @if($po->status=='Approved')
             <button type="submit" class="btn btn-success">Received</button>
          @endif
        @endif
        <br><br>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <div class="container col-md-9">
            <div class="row">
                <div class="col-md-4">
                    <h2>{{$po->id_po}}</h2>
                </div>
                <div class="col-md-4">
                    <p>Status: {{$po->status}}</p>
                </div>
                <div class="col-md-4">
                    <a href="{{URL::to('/invoice_POS', $po->id_po)}}" class="btn btn-success">Print</a>
                    <a href="{{URL::to('/send_email/'.$po->id_purchase)}}" class="btn btn-success">Sent Email</a>
                </div>
            </div><br>
            <!-- <h2>{{$po->status}}</h2> -->
            <input type="hidden" name="id_po" value="{{$po->id_po}}">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="vendor">Vendor</label>
                            <select readonly class="form-control" name="vendor_id" id="vendor">
                            @foreach ($vendor as $vendors)
                                <option value="{{$vendors->id_vendor}}"
                                @if($vendors->id_vendor==$po->vendor_id) selected @endif >
                                    {{$vendors->vendor_name}}</option>
                            @endforeach
                            </select>

                        </div>
                        <div class="col-md-6">
                            <label for="create_date">Create Date</label>
                            <input readonly value="{{Carbon\Carbon::parse($po->created_at)->format('Y-m-d')}}" class="form-control"type="date" name="create_date" id="create_date">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="notes">Notes</label>

                            <textarea readonly value = "true" class="form-control"type="text" name="notes" id="notes" cols="5" rows="5"> {{$po->notes}}</textarea>


                        </div>
                        <div class="col-md-6">
                            <label for="order_date">Order Date</label>
                            <input readonly value="{{$po->order_date}}" class="form-control"type="date" name="order_date" id="order_date">
                        </div>
                    </div>
                </div>
                @if($po->status=='Approved' || $po->status=='Received')
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="dok">Document</label>
                                </div>
                                <div class="col-md-9">
                                    <input class="form-control" type="file" name="dokumen" id="dokumen" style="outline: none; border:none;">
                                    @if ($po->status=='Received')
                                    <div class="mt-3">
                                        <span>{{ $po->document }} <a href="{{ asset('dokumen/'.$po->id_po.'/'.$po->document) }}">Download</a></span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="notes">Source Document</label>
                            <input readonly value = "{{$po->id_purchase}}" class="form-control"type="text" name="notes" id="notes" >
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
                    @forelse($pos as $vendorss)
                    <tr>
                        <td><select readonly name="product_code" id="product_code" class="form-control">
                            @foreach ($produk as $produks)
                                <option data-id_vendor="{{$produks->id_vendor}}" value="{{$produks->id_produk}}"
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
                    <tr>
                        <td colspan="3">Total: Rp. {{$total}}</td>
                    </tr>
                </tbody>
            </table>
        </form>
        <p>This data was created by {{$users->name}} on {{$users->created_at}}</p>
    </div>
    <script>
        console.log($(`select[name="product_code"] option[data-id_vendor="${$(`select[name="vendor_id"]`).val()}"]`))
        $(`select[name="product_code"] option`).addClass("d-none")
        $(`select[name="product_code"] option[data-id_vendor="${$(`select[name="vendor_id"]`).val()}"]`).removeClass("d-none")

        $(`select[name="vendor_id"]`).on("change",function(){
            $(`select[name="product_code"] option`).addClass("d-none")
            $(`select[name="product_code"] option[data-id_vendor="${$(this).val()}"]`).removeClass("d-none")
        })
    </script>
@endsection
