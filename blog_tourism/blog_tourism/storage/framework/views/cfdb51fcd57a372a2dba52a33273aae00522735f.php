
<?php $__env->startSection('content'); ?>
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
                <img class="featurette-image img-fluid mx-auto" src="<?php echo e($path); ?>" alt="Generic placeholder image">
            </center>
        </div>
        <div class="col-md-12">
            <h2 class="featurette-heading"><?php echo e($blog->title); ?></h2>
            <p class="lead"><?php echo e($blog->description); ?></p>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\code_yoca\blog_tourism\resources\views/admin/blog_detail.blade.php ENDPATH**/ ?>