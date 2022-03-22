
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
<form class="form-signin" method="post" action="<?php echo e(URL('login_validation')); ?>">
    <?php echo csrf_field(); ?>
    <center>
        <h1 class="h3 mb-3 font-weight-normal">Login</h1>
    </center>
    <?php if($message = Session::get('alert-login')): ?>
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong><?php echo e($message); ?></strong>
    </div>
    <?php endif; ?>
    <div class="form-group">
        <label for="exampleInputEmail1">Login Sebagai</label>
        <select class="form-control" name="login_as" style="padding: 5px;font-size: 14px;">
            <option value="1">User</option>
            <option value="2">Admin</option>
        </select>
        <div class="invalid-feedback">
            <?php echo e($errors->first('login_as')); ?>

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
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" class="form-control <?= ($errors->first('password') != "") ? 'is-invalid' : ''; ?>" id="exampleInputPassword1">
        <div class="invalid-feedback">
            <?php echo e($errors->first('password')); ?>

        </div>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ACER\Desktop\blog_tourism\resources\views/user/login_user.blade.php ENDPATH**/ ?>