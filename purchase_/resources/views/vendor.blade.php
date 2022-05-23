@extends('template')
 
@section('title_Vendor', 'active')
 
@section('sidebar')
    @parent
@endsection
 
@section('title_')
<h5 id="form">Vendor</h5><br>
@endsection

@section('content')    
    <div class="shadow p-3 mb-5 bg-white rounded">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        @if(Auth::user()->level=='admin')
        <a href="{{url('Vendor/create')}}" class="btn btn-success">CREATE</a><br><br>
        @endif
        <table class="table">
            <tr>
                <th>No</th>
                <th>Vendor Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
            </tr>
            <?php $no=1 ?>
            @forelse ($vendor as $vendors)            
            <tr>                
                <td><a href="{{route('Vendor.edit', $vendors->id_vendor)}}">{{ $no++ }}</a></td>
                <td>{{ $vendors->vendor_name }}</td>
                <td>{{ $vendors->address }}</td>
                <td>{{ $vendors->phone }}</td>
                <td>{{ $vendors->email }}</td>                
            </tr>
            @empty
                <div class="alert alert-danger">
                    Data Vendor belum Tersedia.
                </div>
            @endforelse 
        </table>
        {{ $vendor->links() }}
    </div>
@endsection