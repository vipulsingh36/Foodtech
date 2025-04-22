
<?php $__env->startSection('title','Social Links'); ?>
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<?php $__env->startComponent('admin.components.content-header',['breadcrumb'=>['Dashboard'=>'admin/dashboard']]); ?>
    <?php $__env->slot('title'); ?> Social Links <?php $__env->endSlot(); ?>
    <?php $__env->slot('add_btn'); ?>  <?php $__env->endSlot(); ?>
    <?php $__env->slot('active'); ?> Social Links <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<!-- Main content -->
<section class="content card">
    <div class="container-fluid card-body">
        <!-- form start -->
        <form class="form-horizontal" id="update_social"  method="POST" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <?php $__currentLoopData = $social; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Social Links Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <label>Instagram</label>
                                <input type="url" class="form-control" name="instagram" placeholder="Enter Instagram Url" value="<?php echo e($item->instagram); ?>">
                                <small>Leave this field empty if you want to hide this icon</small>
                            </div>
                            <div class="form-group">
                                <label>Twitter</label>
                                <input type="url" class="form-control" name="twitter" placeholder="Enter Twitter Url" value="<?php echo e($item->twitter); ?>">
                                <small>Leave this field empty if you want to hide this icon</small>
                            </div>
                            <div class="form-group">
                                <label>Facebook</label>
                                <input type="url" class="form-control" name="facebook" placeholder="Enter Facebook Url" value="<?php echo e($item->facebook); ?>">
                                <small>Leave this field empty if you want to hide this icon</small>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form> <!-- /.form start -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/script/resources/views/admin/settings/social.blade.php ENDPATH**/ ?>