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

        <form action="" method="get" class="row mb-4 ml-1">
            <?php $vendor_name = [] ?>
            <select name="vendor_name" class="form-control col-sm-10 mr-2">
                <option value="">Filter Vendor Name </option>
                @foreach ($vendor as $vendors)
                    @if(!in_array($vendors->vendor_name, $vendor_name))
                    <?php if(!in_array($vendors->vendor_name, $vendor_name)) array_push($vendor_name, $vendors->vendor_name) ?>
                    <option <?= $_GET && $_GET['vendor_name'] == $vendors->vendor_name ? "selected" : "" ?> value="{{ $vendors->vendor_name }}">{{ $vendors->vendor_name }}</option>

                    @endif
                @endforeach 
            </select>
            <button type="submit" class="btn btn-success mr-2 ">Filter</button>
            <a href="/Vendor" class="btn btn-success">Reset</a>
        </form>

        <table class="table table-striped table-hover">
            <tr>
                <th>No</th>
                <th>Vendor Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
            </tr>
            <?php $no=1 ?>
            @forelse ($vendor as $vendors)  

            <?php 
                $vendor_name = ($_GET && $_GET['vendor_name'] != "") ? ($_GET && $_GET['vendor_name'] == $vendors->vendor_name ? true : false) : true;
            ?>

            @if($vendor_name)
            
            <tr  class="border px-4 py-2" onclick="window.location='{{route('Vendor.edit', $vendors->id_vendor)}}' " style="cursor: pointer;">               
         
                <td>{{ $no++ }}</td>
                <td>{{ $vendors->vendor_name }}</td>
                <td>{{ $vendors->address }}</td>
                <td>{{ $vendors->phone }}</td>
                <td>{{ $vendors->email }}</td>                
            </tr>
            @endif
            @empty
                <div class="alert alert-danger">
                    Data Vendor belum Tersedia.
                </div>
            @endforelse 
        </table>
        {{ $vendor->links() }}
    </div>
@endsection