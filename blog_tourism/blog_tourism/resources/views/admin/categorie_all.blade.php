@extends('admin.index')
@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Semua Kategori</h1>
    <br />
    <a type="button" class="btn btn-md btn-block btn-outline-primary" href="{{ URl('/admin/categorie_add') }}">Tambah Kategori</a>
    @if ($message = Session::get('alert-delete-categorie-admin'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <br />
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $seq_number = 1; ?>
                <?php foreach ($categorie_all as $row) { ?>
                    <tr>
                        <td><?= $seq_number; ?></td>
                        <td><?= $row->name; ?></td>
                        <td>
                            <center>
                                <a type="button" class="btn btn-primary" href="{{ URL('/admin/categorie_edit/'.$row->id) }}">Edit</a>
                            </center>
                        </td>
                    </tr>
                    <?php $seq_number++; ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

@endsection