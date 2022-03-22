
<?php $__env->startSection('content'); ?>
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <?php if($message = Session::get('alert-login-admin')): ?>
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong><?php echo e($message); ?></strong>
    </div>
    <?php endif; ?>

    <?php $data_user = \App\User::find(session('admin_id')); ?>
    <h1 class="display-4">Wonderful Indonesia</h1>
    <p class="lead">Blog Tourism</p>
    <p class="lead">Administrator</p>
</div>
<div class="container marketing">
    <!-- Three columns of text below the carousel -->
    <?php $blog = \App\Article::take(3)->get(); ?>
    <?php if($blog!=NULL): ?>
    <center>
        <p class="lead">
        <h4>Beberapa blog terakhir yang terunggah.</h4>
        </p>
    </center>
    <br />
    <div class="row">
        <?php $__currentLoopData = $blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-4">
            <?php
            if (file_exists("./articles_image/" . $row->image)) {
                $path = URL('articles_image/' . $row->image);
            } else {
                $path = URL('storage/articles_image/' . $row->image);
            }
            ?>
            <img class="rounded-circle" src="<?php echo e($path); ?>" alt="Generic placeholder image" width="140" height="140">
            <h2><?php echo e($row->title); ?></h2>
            <p><?= substr($row->description, 0, 100) . "..."; ?></p>
            <p><a class="btn btn-secondary" href="<?php echo e(URL('/blog_detail/'.$row->id)); ?>" role="button">Lihat Lebih Lengkap &raquo;</a></p>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php else: ?>
    <center>
        <p class="lead">
        <h4>Maaf, Belum ada blog yang tersedia</h4>
        </p>
    </center>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\code_yoca\blog_tourism\resources\views/admin/home.blade.php ENDPATH**/ ?>