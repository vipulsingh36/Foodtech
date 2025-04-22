
<?php $__env->startSection('title','Add New Tax'); ?>
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<?php $__env->startComponent('admin.components.content-header',['breadcrumb'=>['Dashboard'=>'admin/dashboard','All Tax'=>'admin/tax']]); ?>
    <?php $__env->slot('title'); ?> Add Tax <?php $__env->endSlot(); ?>
    <?php $__env->slot('add_btn'); ?>  <?php $__env->endSlot(); ?>
    <?php $__env->slot('active'); ?> Add Tax <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<!-- Main content -->
<section class="content card">
    <div class="container-fluid card-body">
        <!-- form start -->
        <form class="form-horizontal" id="add_tax"  method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                   <input type="hidden" class="url" value="<?php echo e(url('admin/tax')); ?>" >
                    <!-- jquery validation -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tax Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <span>Percent (%)</span>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="number" class="form-control" name="percent" placeholder="Percent">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <span>Status</span>
                                    </div>
                                    <div class="col-md-10">
                                        <select class="form-control" name="tax_status"  style="width: 100%;">
                                            <option value="1" selected>Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </div>
        </form> <!-- /.form start -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/script/resources/views/admin/tax/create.blade.php ENDPATH**/ ?>