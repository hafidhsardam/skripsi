<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <style type="text/css">
        .font {
        font-size: 80%;
        }

        .label {
        float: right;
        width: 200px;
        padding-right: 24px;
        }
     </style>
</head>
<body>
    <h3>{{ $title }}</h3>
    <p class="label">Date Printed: {{ $date }}</p>    
    <h4><b>{{ $id_po }}</b></h4>
    <p>Vendor Name: {{ $data_vendor->vendor_name }}</p>
    <p class="font">Address: {{ $data_vendor->address }}</p>
    <p class="font">Phone Number: {{ $data_vendor->phone }}</p>
    <p class="font">Email: {{ $data_vendor->email }}</p>

    <table class="table table-bordered">
        <tr>
            <th>Nama Produk</th>
            <th>Kuantitas</th>
            <th>Deskripsi</th>
            <th>Harga</th>
        </tr>
        <?php $total = 0; ?>
        @foreach($data_po as $po)
        <?php $total += $po->price; ?>
        <tr>
            <td>{{ $po->nama_produk }}</td>
            <td>{{ $po->qty }}</td>
            <td>{{ $po->deskripsi }}</td>
            <td> Rp. {{ $po->price }}</td>
        </tr>
        @endforeach
    </table>
    Total: Rp {{$total}}
</body>
</html>