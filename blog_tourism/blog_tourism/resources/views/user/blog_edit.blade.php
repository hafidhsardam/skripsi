@extends('user.index')
@section('content')
<style>
    html,
    body {
        height: 100%;
    }

    .form-signin {
        width: 100%;
        max-width: 1000px;
        padding: 15px;
        margin: 0 auto;
    }

    .form-signin .checkbox {
        font-weight: 400;
    }

    .form-signin .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
    }

    .form-signin .form-control:focus {
        z-index: 2;
    }

    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
</style>
<center>
    <h1 class="h3 mb-3 font-weight-normal">Edit Blog</h1>
</center>
<form class="form-signin" method="POST" action="{{ URL('blog_update') }}" enctype="multipart/form-data">
    @if ($message = Session::get('alert-blog-edit'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    @csrf
    <input type="hidden" name="id" value="<?= $blog->id; ?>">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nama">Title</label>
                <input type="text" name="title" class="form-control <?= ($errors->first('title') != "") ? 'is-invalid' : ''; ?>" id="title" value="<?= (old('title')) ? old('title') : $blog->title; ?>">
                <div class="invalid-feedback">
                    {{ $errors->first('title') }}
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Category</label>
                <select class="form-control" name="category" style="padding: 5px;font-size: 14px;">
                    <?php
                    $category = \App\Categorie::all();
                    foreach ($category as $row) {
                        if (old('category')) {
                            if (old('category') == $row->id) {
                                $selected = 'selected';
                            } else {
                                if ($row->id == $blog->categorie_id) {
                                    $selected = "selected";
                                } else {
                                    $selected = '';
                                }
                            }
                        } else {
                            if ($row->id == $blog->categorie_id) {
                                $selected = "selected";
                            } else {
                                $selected = '';
                            }
                        }
                        echo "<option value='" . $row->id . "' " . $selected . " >" . $row->name . "</option>";
                    }
                    ?>
                </select>
                <div class="invalid-feedback">
                    {{ $errors->first('category') }}
                </div>
            </div>
            <div class="form-group">
                <label for="file">Picture</label>
                <input type="file" name="file" class="form-control <?= ($errors->first('file') != "") ? 'is-invalid' : ''; ?>" id="file">
                <div class="invalid-feedback">
                    {{ $errors->first('file') }}
                </div>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control <?= ($errors->first('description') != "") ? 'is-invalid' : ''; ?>"><?= (old('description')) ? old('description') : $blog->description; ?></textarea>
                <div class="invalid-feedback">
                    {{ $errors->first('description') }}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <center>
                <div>
                    <?php
                    if (file_exists("./articles_image/" . $blog->image)) {
                        $path = URL('articles_image/' . $blog->image);
                    } else {
                        $path = URL('storage/articles_image/' . $blog->image);
                    }
                    ?>
                    <img src="{{ $path }}" class="img-thumbnail img-preview" style="max-width: 75%; height: auto;">
                </div>
            </center>
        </div>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Simpan</button>
    <a class="btn btn-lg btn-warning btn-block" style="color: #fff;" type="button" href="{{ URl('/blog_all') }}">Kembali</a>
</form>
@endsection