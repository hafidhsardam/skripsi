@extends('templateWithOutSearch')
 
@section('title_Product', 'active')
 
@section('sidebar')
    @parent
@endsection
 
@section('title_')
<h5 id="form">Product</h5><br>
@endsection

@section('content')
<div class="shadow p-3 mb-5 bg-white rounded">
    <form action="{{route('Produk.store')}}" method="post">
    @csrf
    <a href="#" onclick="history.back()" class="btn btn-success">Back</a>

    @if(Auth::user()->level=='admin')
        <button type="submit" class="btn btn-success">Save</button>            
        <button type="reset" class="btn btn-success">Discard</button>
    @endif<br><br>
        <div class="form-group container col-md-10">
            <div class="row">
                <div class="col-md-3 mb-2">
                    <label for="name">Product Name</label>
                </div>
                <div class="col-md-3 mb-2">
                    <input required type="text" name="nama" id="nama" class="form-control">
                </div>
                <div class="col-md-3 mb-2">
                    <label for="stok">Stock</label>
                </div>
                <div class="col-md-3 mb-2">
                    <input required type="number" name="stok" id="stok" class="form-control">
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-3 mb-2">
                    <label for="harga">Price</label>
                </div>
                <div class="col-md-3 mb-2">
                    <input required type="number" name="price" id="price" class="form-control">
                </div>
                <div class="col-md-3 mb-2">
                    <label for="type">Type</label>
                </div>
                <div class="col-md-3 mb-2">
                    <input required type="text" name="type" id="type" class="form-control">
                </div>
                <div class="col-md-3 mt-4 mb-2">
                    <label for="stok">Vendor</label>
                </div>
                <div class="col-md-3 mt-4 mb-2">
                    <select name="id_vendor" required class="form-control">
                        <option value="">Pilih Vendor</option>
                        @foreach($vendor as $value)
                        <option value="{{$value->id_vendor}}">{{$value->vendor_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div><br>
            
        </div>
    </form>
</div>
@endsection