@extends('admin.index')
@section('content')
<style>
    .kotak {
        position: sticky;
        width: auto;
        height: auto;
        padding: 20px;

        background: #FFFFFF;
        /* 1 */

        box-shadow: 0px 16px 24px rgba(0, 0, 0, 0.06), 0px 2px 6px rgba(0, 0, 0, 0.04), 0px 0px 1px rgba(0, 0, 0, 0.04);
        border-radius: 19.0044px;
    }

    .table {
        box-shadow: 0px 16px 24px rgba(0, 0, 0, 0.06), 0px 2px 6px rgba(0, 0, 0, 0.04), 0px 0px 1px rgba(0, 0, 0, 0.04);
        border-radius: 19.0044px;
    }
    .input-group{
        padding: 20px;
    }
</style>
<div>
    <h1>Purchase Request</h1>
   
</div>
<div class='kotak'>
    <div>
    <button type="button" class="btn btn-dark">SAVE</button> 

    <button type="button" class="btn btn-dark">DISCARD</button> 
    </div>

    <br>

    <div>
        <form class="form-PR" method="post" action="/Create/CreatePurchaseRequest">
            @csrf

            <form class="needs-validation" novalidate>
                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="validationTooltip01">Vendor</label>
                    <input type="text" name = "Vendor_name" class="form-control" id="validationTooltip01" placeholder="" value="" required>
                    <div class="invalid-tooltip">
                      Please input vendor
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationTooltip02">Create Date</label>
                    <input type="date" name = "Create_date" class="form-control" id="validationTooltip02" placeholder="Last name" value="" required>
                    <div class="valid-tooltip">
                      Looks good!
                    </div>
                  </div>
                  

                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                      <label for="validationTooltip01">Note</label>
                      <input type="text" name = "Notes" class="form-control" id="validationTooltip01" placeholder="" value="" required>
                      <div class="invalid-tooltip">
                        Looks good!
                      </div>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label for="validationTooltip02">Order Date</label>
                      <input type="date" name = "Order_date" class="form-control" id="validationTooltip02" placeholder="Last name" value="" required>
                      <div class="valid-tooltip">
                        Looks good!
                      </div>
                    </div>
                </div>
              </form>
        </form>
</div>
<br>
    <div>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Description</th>
                    <th scope="col">Unit Of Measure</th>
                    <th scope="col">Quantity</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


@endsection