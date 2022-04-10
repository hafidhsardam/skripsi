@extends('admin.index')
@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Semua User</h1>
    <br />
    <a type="button" class="btn btn-md btn-block btn-outline-primary" href="{{ URl('/admin/user_add') }}">Tambah User</a>
    @if ($message = Session::get('alert-delete-user'))
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
                    <th style="width: 25px;">#</th>
                    <th style="width: 300px;">Nama</th>
                    <th style="width: 50px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $seq_number = 1; ?>
                <?php foreach ($user_all as $row) { ?>
                    <tr>
                        <td><?= $seq_number; ?></td>
                        <td><?= $row->name; ?></td>
                        <td>
                            <center>
                                <a type="button" class="btn btn-primary" href="{{ URL('/admin/user_edit/'.$row->id) }}">Edit</a>
                                <a type="button" class="btn btn-danger" href="{{ URL('/admin/user_delete/'.$row->id) }}">Delete</a>
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