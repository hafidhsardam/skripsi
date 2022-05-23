@extends('template')
 
@section('title_Product', 'active')
 
@section('sidebar')
    @parent
@endsection
 
@section('title_')
<h5 id="form">Produk</h5><br>
@endsection

@section('content')
<div class="shadow p-3 mb-5 bg-white rounded">
    <form action="{{route('Produk.store')}}" method="post">
    @csrf
    @if(Auth::user()->level=='admin')
        <button type="submit" class="btn btn-success">Save</button>            
        <button type="reset" class="btn btn-success">Discard</button>
    @endif<br><br>
        <div class="form-group container col-md-10">
            <div class="row">
                <div class="col-md-2">
                    <label for="name">Product Name</label>
                </div>
                <div class="col-md-3">
                    <input required type="text" name="nama" id="nama" class="form-control">
                </div>
                <div class="col-md-2">
                    <label for="stok">Stok</label>
                </div>
                <div class="col-md-3">
                    <input required type="number" name="stok" id="stok" class="form-control">
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-2">
                    <label for="harga">Price</label>
                </div>
                <div class="col-md-3">
                    <input required type="number" name="price" id="price" class="form-control">
                </div>
                <div class="col-md-2">
                    <label for="type">Type</label>
                </div>
                <div class="col-md-3">
                    <input required type="text" name="type" id="type" class="form-control">
                </div>
            </div><br>
            
        </div>
    </form>
</div>
@endsection