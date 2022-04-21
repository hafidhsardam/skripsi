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
    <h1>Vendor</h1>
</div>
<div class='kotak'>
<table>

<tr>
    <th>
        <a href="http://127.0.0.1:8000/CreatePurchaseRequest"> <button type="button" class="btn btn-dark">CREATE</button> </a>
    </th>
    <th style="width: 100%;">
        <div class="input-group rounded">
            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
            <span class="input-group-text border-0" id="search-addon">
                <i class="fas fa-search"></i>
            </span>
        </div>
    </th>
</tr>
</table>
    <br>
    <div>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">Vendor</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                  
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                  
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                   
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection