<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 mr-2 text-dark d-inline-block"><?php echo e($title); ?></h1>
                <?php echo e($add_btn); ?>

            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <?php $__currentLoopData = $breadcrumb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="breadcrumb-item"><a href="<?php echo e(url($value)); ?>"><?php echo e($key); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <li class="breadcrumb-item active"><?php echo e($active); ?></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/script/resources/views/admin/components/content-header.blade.php ENDPATH**/ ?>