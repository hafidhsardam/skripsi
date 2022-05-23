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
        <table class="table">
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
            <tr>                
                <td><a href="{{route('PurchaseRequest.show', $vendors->id_purchase)}}">{{ $no++ }}</a></td>
                <td>{{ $vendors->id_purchase }}</td>
                <td>{{ $vendors->vendor_name }}</td>
                <td>{{ $vendors->produk }}</td>
                <td>{{ $vendors->created_at }}</td>
                <td>{{ $vendors->status }}</td>                
            </tr>
            @empty
                <div class="alert alert-danger">
                    Data Purchase Request belum Tersedia.
                </div>
            @endforelse 
        </table>
        {{ $pur_req->links() }}
    </div>
@endsection