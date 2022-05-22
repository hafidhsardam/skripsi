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
</head>
<body>
    <h3>{{ $title }}</h3>
    <p>Date Printed: {{ $date }}</p>    
    <p>{{ $id_purchase }}</p>
    <table class="table table-bordered">
        <tr>
            <th>Kode Produk</th>
            <th>Kuantitas</th>
            <th>Deskripsi</th>
            <th>Harga</th>
        </tr>
        @foreach($data_purchase as $pr)
        <tr>
            <td>{{ $pr->id_produk }}</td>
            <td>{{ $pr->qty }}</td>
            <td>{{ $pr->deskripsi }}</td>
            <td>{{ $pr->price }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>