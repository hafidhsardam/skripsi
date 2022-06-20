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
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <a href="{{url('PurchaseRequest/create')}}" class="btn btn-success">CREATE</a><br><br>
        <form action="" method="get" class="row mb-4 ml-1">
            <?php $id_purchase = [] ?>
            <select name="id_purchase" class="form-control col-sm-3 mr-2">
                <option value="">Filter PO</option>
                @foreach ($pur_req as $vendors)
                    @if($vendors->status != "Deleted" && !in_array($vendors->id_purchase, $id_purchase))
                    <?php if(!in_array($vendors->id_purchase, $id_purchase)) array_push($id_purchase, $vendors->id_purchase) ?>
                    <option <?= $_GET && $_GET['id_purchase'] == $vendors->id_purchase ? "selected" : "" ?> value="{{ $vendors->id_purchase }}">{{ $vendors->id_purchase }}</option>

                    @endif
                @endforeach 
            </select>
            <?php $vendor_name = [] ?>
            <select name="vendor_name" class="form-control col-sm-2 mr-2">
                <option value="">Filter Vendor </option>
                @foreach ($pur_req as $vendors)
                    @if($vendors->status != "Deleted" && !in_array($vendors->vendor_name, $vendor_name))
                    <?php if(!in_array($vendors->vendor_name, $vendor_name)) array_push($vendor_name, $vendors->vendor_name) ?>
                    <option <?= $_GET && $_GET['vendor_name'] == $vendors->vendor_name ? "selected" : "" ?> value="{{ $vendors->vendor_name }}">{{ $vendors->vendor_name }}</option>

                    @endif
                @endforeach 
            </select>
            <?php $produk = [] ?>
            <select name="produk" class="form-control col-sm-2 mr-2">
                <option value="">Filter Product</option>
                @foreach ($pur_req as $vendors)
                    @if($vendors->status != "Deleted" && !in_array($vendors->produk, $produk))
                    <?php if(!in_array($vendors->produk, $produk)) array_push($produk, $vendors->produk) ?>
                    <option <?= $_GET && $_GET['produk'] == $vendors->produk ? "selected" : "" ?> value="{{ $vendors->produk }}">{{ $vendors->produk }}</option>

                    @endif
                @endforeach 
            </select>
            <?php $status = [] ?>
            <select name="status" class="form-control col-sm-2 mr-2">
                <option value="">Filter Status</option>
                @foreach ($pur_req as $vendors)
                    @if($vendors->status != "Deleted" && !in_array($vendors->status, $status))
                    <?php if(!in_array($vendors->status, $status)) array_push($status, $vendors->status) ?>
                    <option <?= $_GET && $_GET['status'] == $vendors->status ? "selected" : "" ?> value="{{ $vendors->status }}">{{ $vendors->status }}</option>

                    @endif
                @endforeach 
            </select>
            <button type="submit" class="btn btn-info">Filter</button>
            <a href="/PurchaseRequest" class="btn btn-dark ml-2">Reset</a>
        </form>
        <table class="table table-striped table-hover">
            <tr>
                <th>No</th>
                <th>Purchase Request</th>
                <th>Vendor Name</th>
                <th>Product</th>
                <th>Created Date</th>
                <th>Status</th>
            </tr>
            <?php $no=1 ?>
            @forelse ($pur_req as $vendors)      

            <?php 
                $id_purchase = ($_GET && $_GET['id_purchase'] != "") ? ($_GET && $_GET['id_purchase'] == $vendors->id_purchase ? true : false) : true;
                $vendor_name = ($_GET && $_GET['vendor_name'] != "") ? ($_GET && $_GET['vendor_name'] == $vendors->vendor_name ? true : false) : true;
                $produk = ($_GET && $_GET['produk'] != "") ? ($_GET && $_GET['produk'] == $vendors->produk ? true : false) : true;
                $status = ($_GET && $_GET['status'] != "") ? ($_GET && $_GET['status'] == $vendors->status ? true : false) : true;
            ?>      

            @if($vendors->status != "Deleted" && $id_purchase && $vendor_name && $produk && $status)

            <tr  class="border px-4 py-2" onclick="window.location=' {{route('PurchaseRequest.show', $vendors->id_purchase)}}' " style="cursor: pointer;">
                <td>{{ $no++ }}</td>
                <td>{{ $vendors->id_purchase }}</td>
                <td>{{ $vendors->vendor_name }}</td>
                <td>{{ $vendors->produk }}</td>
                <td>{{ $vendors->created_at }}</td>
                <td>{{ $vendors->status }}</td>    
            </tr>

            @endif
            @empty
                <div class="alert alert-danger">
                    Data Purchase Request belum Tersedia.
                </div>
            @endforelse 
        </table>
        {{ $pur_req->links() }}
    </div>
    <script>
        
    </script>
@endsection