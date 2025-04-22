
<?php $__env->startSection('title','My Reviews'); ?>
<?php $__env->startSection('content'); ?>
<div id="site-content">
    <div class="message"></div>
    <div class="container">
        <div class="section-heading">
            <h3 class="title">My Reviews</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Reviews</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-md-12">
            <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card mb-4">
                <h5 class="card-header"><?php echo e($row->product_name); ?></h5>
                <div class="card-body">
                    <h5><?php echo e($row->title); ?></h5>
                    <p><?php echo e($row->desc); ?></p>
                    <ul class="show-review-rating mb-2">
                        <?php for($i=1;$i<=5;$i++): ?>
                            <?php if($i <= $row->rating): ?>
                                <li class="fa fa-star"></li>
                            <?php else: ?>
                                <li class="far fa-star"></li>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </ul>
                    <?php if($row->hide_by_admin == '1'): ?>
                    <div class="alert alert-danger p-2 py-0 m-0 d-inline-block">Hidden by Admin</div>
                    <?php endif; ?>
                    <?php if($row->approved == '0'): ?>
                    <div class="alert alert-danger p-2 py-0 m-0 d-inline-block">Under Approval Process</div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('public.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/script/resources/views/public/my-reviews.blade.php ENDPATH**/ ?>