
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
<form class="form-signin" method="post" action="<?php echo e(URL('register_validation')); ?>">
    <?php echo csrf_field(); ?>
    <center>
        <h1 class="h3 mb-3 font-weight-normal">Register</h1>
    </center>
    <?php if($message = Session::get('alert-register')): ?>
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong><?php echo e($message); ?></strong>
    </div>
    <?php endif; ?>
    <div class="form-group">
        <label for="exampleInputNama1">Nama</label>
        <input type="text" name="name" class="form-control <?= ($errors->first('name') != "") ? 'is-invalid' : ''; ?>" id="exampleInputNama1">
        <div class="invalid-feedback">
            <?php echo e($errors->first('name')); ?>

        </div>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="text" name="email" class="form-control <?= ($errors->first('email') != "") ? 'is-invalid' : ''; ?>" id="exampleInputEmail1">
        <div class="invalid-feedback">
            <?php echo e($errors->first('email')); ?>

        </div>
    </div>
    <div class="form-group">
        <label for="exampleInputPhone1">Nomor Telepon</label>
        <input type="text" name="phone" class="form-control <?= ($errors->first('phone') != "") ? 'is-invalid' : ''; ?>" id="exampleInputPhone1">
        <div class="invalid-feedback">
            <?php echo e($errors->first('phone')); ?>

        </div>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" class="form-control <?= ($errors->first('password') != "") ? 'is-invalid' : ''; ?>" id="exampleInputPassword1">
        <div class="invalid-feedback">
            <?php echo e($errors->first('password')); ?>

        </div>
    </div>
    <div class="form-group">
        <label for="exampleInputConfirmationPassword1">Konfirmasi Password</label>
        <input type="password" name="confirmation_password" class="form-control <?= ($errors->first('confirmation_password') != "") ? 'is-invalid' : ''; ?>" id="exampleInputConfirmationPassword1">
        <div class="invalid-feedback">
            <?php echo e($errors->first('confirmation_password')); ?>

        </div>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Simpan</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\code_yoca\blog_tourism\resources\views/user/register_user.blade.php ENDPATH**/ ?>