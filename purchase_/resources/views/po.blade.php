@extends('template')
 
@section('title_PO', 'active')
 
@section('sidebar')
    @parent
@endsection
 
@section('title_')
<h5 id="form">Purchase Order </h5><br>
@endsection

@section('content')    
    <div class="shadow p-3 mb-5 bg-white rounded">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <a href="{{url('RequestQuotations')}}" class="btn btn-success">CREATE</a><br><br>
        <table class="table">
            <tr>
                <th>No</th>
                <th>Purchase Request</th>
                <th>Vendor Name</th>
                <th>Produk</th>
                <th>Created Date</th>
                <th>Status</th>
            </tr>
            <?php $no=1 ?>
            @forelse ($po as $vendors)            
            <tr>                
                <td><a href="{{route('PurchaseOrder.show',$vendors->id_po)}}">{{ $no++ }}</a></td>
                <td>{{ $vendors->id_po }}</td>
                <td>{{ $vendors->vendor_name }}</td>
                <td>{{ $vendors->produk }}</td>
                <td>{{ $vendors->created_at }}</td>
                <td>{{ $vendors->status }}</td>                
            </tr>
            @empty
                <div class="alert alert-danger">
                    Data Purchase Orders belum Tersedia.
                </div>
            @endforelse 
        </table>
        {{ $po->links() }}
    </div>
@endsection