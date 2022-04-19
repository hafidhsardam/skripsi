@extends('admin.index')
@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    @if ($message = Session::get('alert-login-admin'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif

    <?php $data_user = \App\User::find(session('admin_id')); ?>
    <h1 class="display-4">Wonderful Indonesia</h1>
    <p class="lead">Purchash</p>
    <p class="lead">Administrator</p>
</div>
<div class="container marketing">
    <!-- Three columns of text below the carousel -->
    <?php $blog = \App\Article::take(3)->get(); ?>
    @if($blog!=NULL)
    <center>
        <p class="lead">
        <h4>Beberapa blog terakhir yang terunggah.</h4>
        </p>
    </center>
    <br />
    <div class="row">
        @foreach ($blog as $row)
        <div class="col-lg-4">
            <?php
            if (file_exists("./articles_image/" . $row->image)) {
                $path = URL('articles_image/' . $row->image);
            } else {
                $path = URL('storage/articles_image/' . $row->image);
            }
            ?>
            <img class="rounded-circle" src="{{ $path }}" alt="Generic placeholder image" width="140" height="140">
            <h2>{{ $row->title }}</h2>
            <p><?= substr($row->description, 0, 100) . "..."; ?></p>
            <p><a class="btn btn-secondary" href="{{ URL('/blog_detail/'.$row->id) }}" role="button">Lihat Lebih Lengkap &raquo;</a></p>
        </div>
        @endforeach
        
    </div>
    @else
    <center>
        <p class="lead">
        <h4>Maaf, Belum ada blog yang tersedia</h4>
        </p>
    </center>
    @endif
</div>
@endsection