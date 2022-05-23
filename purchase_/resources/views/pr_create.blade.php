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
        <form method="post" action="{{route('PurchaseRequest.store')}}" id="dynamic_form">
        @csrf
        <!-- @method('PUT') -->
            <!-- <input type="submit" name="save" id="save" class="btn btn-success" value="Save"> -->
            <button type="submit" class="btn btn-success">Save</button>
            <button type="reset" class="btn btn-success">Discard</button><br><br>
            <div class="container col-md-9">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="vendor">Vendor</label>
                            <select class="form-control" name="vendor_id" id="vendor" required>
                            @foreach ($vendor as $vendors)
                                <option value="{{$vendors->id_vendor}}">{{$vendors->vendor_name}}</option>
                            @endforeach
                            </select>

                        </div>
                        <div class="col-md-6">
                            <label for="create_date">Create Date</label>
                            <input class="form-control"type="date" name="create_date" required id="create_date" value="{{ date('Y-m-d')}}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="notes">Notes</label>
                            <textarea name="notes" class="form-control" id="notes" cols="5" rows="5"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="order_date">Order Date</label>
                            <input class="form-control"type="date" name="order_date" required id="order_date">
                        </div>
                    </div>
                </div>
            </div><br><br>
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Description</th>
                        <th>Unit of Measure</th>
                        <th>Quantity</th>
                    </tr>                    
                </thead>
                <tbody>
                    <tr>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
    <script>
    $(document).ready(function(){

        var count = 1;

        dynamic_field(count);

        function dynamic_field(number)
        {
            html = '<tr>';
            html += '<td><select name="product_code[]" id="product_code[]" class="form-control" required>'+
            '@foreach ($produk as $produks)<option value="{{$produks->id_produk}}">{{$produks->nama_produk}}</option>@endforeach</select></td>';            
            html += '<td><input type="text" name="description[]" class="form-control" required /></td>';
            html += '<td><input type="text" name="unit[]" class="form-control" required /></td>';
            html += '<td><input type="number" name="qty[]" class="form-control" required /></td>';
            if(number > 1)
            {
                html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
                $('tbody').append(html);
                // alert(number);
            }
            else
            {   
                html += '<td><button type="button" name="add" id="add" class="btn btn-success">+ Add an item</button></td></tr>';
                $('tbody').html(html);
            }
        }

        $(document).on('click', '#add', function(){
            count++;
            dynamic_field(count);
        });

        $(document).on('click', '.remove', function(){
            count--;
            $(this).closest("tr").remove();
        });
    });
</script>
@endsection