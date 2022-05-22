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
        <form action="{{route('Vendor.store')}}" method="post">
        @csrf
            <button type="submit" class="btn btn-success">Save</button>            
            <button type="reset" class="btn btn-success">Discard</button><br><br>
            <div class="form-group container col-md-10">
                <div class="row">
                    <div class="col-md-2">
                        <label for="email">Vendor Name</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="vendor_name" id="vendor_name" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <label for="phone">Phone</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="phone" id="phone" class="form-control">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-2">
                        <label for="address">Vendor Address</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="vendor_address" id="vendor_address" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <label for="email">Email</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="email" id="email" class="form-control">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-2">
                        <label for="notes">Notes</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="notes" id="notes" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <label for="type">Type</label>
                    </div>
                    <div class="col-md-3">
                        <select name="type" id="type" class="form-control">
                            <option value="best_partner">Best Partner</option>
                            <option value="casual">Casual</option>
                        </select>
                    </div>
                </div><br>
            </div>
        </form>
    </div>
@endsection