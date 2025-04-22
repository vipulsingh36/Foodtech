
<?php $__env->startSection('title',$page->page_title); ?>
<?php $__env->startSection('content'); ?>
<div class="product-box">
  <div class="message"></div>
  <div class="container">
    <div class="section-heading">
        <h3 class="title"><?php echo e($page->page_title); ?></h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page"><?php echo e($page->page_title); ?></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php echo htmlspecialchars_decode($page->description); ?>

        </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('public.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/script/resources/views/public/single.blade.php ENDPATH**/ ?>