
<?php $__env->startSection('content'); ?>
<style>
    html,
    body {
        height: 100%;
    }

    .form-signin {
        width: 100%;
        max-width: 330px;
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
<form class="form-signin" method="post" action="<?php echo e(URL('/admin/categorie_store')); ?>">
    <?php echo csrf_field(); ?>
    <center>
        <h1 class="h3 mb-3 font-weight-normal">Tambah Kategori</h1>
    </center>
    <?php if($message = Session::get('alert-add-categorie')): ?>
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong><?php echo e($message); ?></strong>
    </div>
    <?php endif; ?>
    <div class="form-group">
        <label for="exampleInputEmail1">Nama Kategori</label>
        <input type="text" name="name" class="form-control <?= ($errors->first('name') != "") ? 'is-invalid' : ''; ?>" value="<?php echo e(old('name')); ?>" id="exampleInputEmail1">
        <div class="invalid-feedback">
            <?php echo e($errors->first('name')); ?>

        </div>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Simpan</button>
    <a class="btn btn-lg btn-warning btn-block" style="color: #fff;" type="button" href="<?php echo e(URl('/admin/manage_categorie')); ?>">Kembali</a>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\code_yoca\blog_tourism\resources\views/admin/categorie_create.blade.php ENDPATH**/ ?>