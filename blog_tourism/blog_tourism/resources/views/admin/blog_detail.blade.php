@extends('admin.index')
@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Wonderful Indonesia</h1>
    <p class="lead">Blog Tourism.</p>
    <p class="lead">Blog Detail</p>
</div>
<div class="container marketing">
    <div class="row featurette">
        <div class="col-md-12">
            <center>
                <?php
                if (file_exists("./articles_image/" . $blog->image)) {
                    $path = URL('articles_image/' . $blog->image);
                } else {
                    $path = URL('storage/articles_image/' . $blog->image);
                }
                ?>
                <img class="featurette-image img-fluid mx-auto" src="{{ $path }}" alt="Generic placeholder image">
            </center>
        </div>
        <div class="col-md-12">
            <h2 class="featurette-heading">{{ $blog->title }}</h2>
            <p class="lead">{{ $blog->description }}</p>
        </div>
    </div>
</div>
@endsection