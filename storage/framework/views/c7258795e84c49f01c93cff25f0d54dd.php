
<?php $__env->startSection('title','Edit Page'); ?>
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<?php $__env->startComponent('admin.components.content-header',['breadcrumb'=>['Dashboard'=>'admin/dashboard','All Pages'=>'admin/pages']]); ?>
    <?php $__env->slot('title'); ?> Edit Page <?php $__env->endSlot(); ?>
    <?php $__env->slot('add_btn'); ?>  <?php $__env->endSlot(); ?>
    <?php $__env->slot('active'); ?> Edit Page <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<!-- Main content -->
<section class="content card">
    <div class="container-fluid card-body">
        <!-- form start -->
        <form class="form-horizontal" id="update_page"  method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo e(method_field('PUT')); ?>

            <?php if($pages): ?>
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                   <input type="hidden" class="url" value="<?php echo e(url('admin/pages/'.$pages->page_id)); ?>" >
                   <input type="hidden" class="rdt-url" value="<?php echo e(url('admin/pages')); ?>" >
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Page Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <span>Page Title</span>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="title" placeholder="Page Title" value="<?php echo e($pages->page_title); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <span>Page Slug</span>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="slug" placeholder="Page Slug" value="<?php echo e($pages->page_slug); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <span>Description</span>
                                    </div>
                                    <div class="col-md-10">
                                    <textarea  id="summernote" class="form-control" name="description" placeholder="Place some text here"><?php echo htmlspecialchars_decode($pages->description); ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <span>Status</span>
                                    </div>
                                    <div class="col-md-10">
                                        <select class="form-control" name="page_status"  style="width: 100%;">
                                            <option value="1" <?php echo e(($pages->status == "1" ? "selected":"")); ?>>Active</option>
                                            <option value="0" <?php echo e(($pages->status == "0" ? "selected":"")); ?>>Inactive</option>
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
            <?php endif; ?>
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
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/script/resources/views/admin/pages/edit.blade.php ENDPATH**/ ?>