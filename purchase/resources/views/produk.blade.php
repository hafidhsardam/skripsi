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
        
        <form action="" method="get" class="row mb-4 ml-1">
            <?php $nama_produk = [] ?>
            <select name="nama_produk" class="form-control col-sm-2 mr-2">
                <option value="">Filter Product Name </option>
                @foreach ($product as $vendors)
                    @if(!in_array($vendors->nama_produk, $nama_produk))
                    <?php if(!in_array($vendors->nama_produk, $nama_produk)) array_push($nama_produk, $vendors->nama_produk) ?>
                    <option <?= $_GET && $_GET['nama_produk'] == $vendors->nama_produk ? "selected" : "" ?> value="{{ $vendors->nama_produk }}">{{ $vendors->nama_produk }}</option>

                    @endif
                @endforeach 
            </select>
            <button type="submit" class="btn btn-info">Filter</button>
            <a href="/Produk" class="btn btn-dark ml-2">Reset</a>
        </form>

        <table class="table table-striped table-hover">
            <tr>
                <th>No</th>
                <th>Product Name</th>
                <th>Vendor Name</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Type</th>
            </tr>
            <?php $no=1 ?>
            @forelse ($product as $produks)

            <?php 
                $nama_produk = ($_GET && $_GET['nama_produk'] != "") ? ($_GET && $_GET['nama_produk'] == $produks->nama_produk ? true : false) : true;
                $vendor_name = ($_GET && $_GET['vendor_name'] != "") ? ($_GET && $_GET['vendor_name'] == $vendors->vendor_name ? true : false) : true;

            ?>
            

            @if($nama_produk)

            <tr  class="border px-4 py-2" onclick="window.location=' {{route('Produk.edit', $produks->id_produk)}}' " style="cursor: pointer;">

                <td>{{ $no++ }}</td>
                <td>{{ $produks->nama_produk }}</td>
                <td>{{ $produks->showVendor->vendor_name }}</td>
                <td>{{ $produks->stok }}</td>
                <td>{{ $produks->price }}</td>
                <td>{{ $produks->type }}</td>
            </tr>
            @endif
            @empty
                <div class="alert alert-danger">
                    Product has not been created
                </div>
            @endforelse 
        </table>
        {{ $product->links() }}
    </div>
@endsection