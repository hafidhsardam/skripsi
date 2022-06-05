@extends('template')
 
@section('title_Product', 'active')
 
@section('sidebar')
    @parent
@endsection
 
@section('title_')
<h5 id="form">Product</h5><br>
@endsection

@section('content')    
    <div class="shadow p-3 mb-5 bg-white rounded">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        @if(Auth::user()->level=='admin')
        <a href="{{url('Produk/create')}}" class="btn btn-success">CREATE</a>
        @endif<br><br>
        <table class="table table-striped table-hover">
            <tr>
                <th>No</th>
                <th>Product Name</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Type</th>
            </tr>
            <?php $no=1 ?>
            @forelse ($product as $produks)        
            
            <tr  class="border px-4 py-2" onclick="window.location=' {{route('Produk.edit', $produks->id_produk)}}' " style="cursor: pointer;">               
             
                <td>{{ $no++ }}</td>
                <td>{{ $produks->nama_produk }}</td>
                <td>{{ $produks->stok }}</td>
                <td>{{ $produks->price }}</td>
                <td>{{ $produks->type }}</td>                
            </tr>
            @empty
                <div class="alert alert-danger">
                    Data produk belum Tersedia.
                </div>
            @endforelse 
        </table>
        {{ $product->links() }}
    </div>
@endsection