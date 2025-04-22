
<?php $__env->startSection('title','General Settings'); ?>
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php $__env->startComponent('admin.components.content-header',['breadcrumb'=>['Dashboard'=>'admin/dashboard']]); ?>
        <?php $__env->slot('title'); ?> General Settings <?php $__env->endSlot(); ?>
        <?php $__env->slot('add_btn'); ?> <?php $__env->endSlot(); ?>
        <?php $__env->slot('active'); ?> General Settings <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- form start -->
            <form class="form-horizontal" id="updateGeneralSetting" method="POST">
            <?php echo e(csrf_field()); ?>

                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                    <input type="hidden" class="url" value="<?php echo e(url('admin/general-settings')); ?>" >
                    <!-- jquery validation -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">General Information</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <span>Site Logo</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="hidden" class="custom-file-input" name="old_logo" value="<?php echo e($item->site_logo); ?>" />
                                                    <input type="file" class="form-control" name="logo" onChange="readURL(this);">
                                                </div>
                                                <div class="col-md-2">
                                                    <?php if(empty($item->site_logo)): ?>
                                                        <img class="img-thumbnail" id="image" src="<?php echo e(asset('public/site/default.png')); ?>" width="150px" >
                                                    <?php else: ?>
                                                        <img class="img-thumbnail" id="image" src="<?php echo e(asset('public/site/'.$item->site_logo)); ?>" width="150px" >
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <span>Site Name</span>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="site_name" value="<?php echo e($item->site_name); ?>"  placeholder="Enter Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <span>Site Title</span>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="site_title" value="<?php echo e($item->site_title); ?>"  placeholder="Enter Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <span>Theme Color</span>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="color" class="form-control" name="theme_color" value="<?php echo e($item->theme_color); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <span>Site Copyright</span>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="site_copyright" value="<?php echo e($item->copyright); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <span>Currency Format</span>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="currency" value="<?php echo e($item->currency); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <span>Description</span>
                                                </div>
                                                <div class="col-md-10">
                                                    <textarea class="form-control" name="description" cols="30" rows="2"><?php echo e($item->description); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Contact Details</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <span>Phone</span>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="number" class="form-control" name="phone" value="<?php echo e($item->phone); ?>">
                                            <small>(If you want to hide this on frontend leave empty)</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <span>Email</span>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="email" class="form-control" name="email" value="<?php echo e($item->email); ?>">
                                            <small>(If you want to hide this on frontend leave empty)</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <span>Address</span>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="address" value="<?php echo e($item->address); ?>">
                                            <small>(If you want to hide this on frontend leave empty)</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary update-general-settings mb-3" value="Update"/>
                        <!-- /.card -->
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </form> <!-- /.form start -->
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/script/resources/views/admin/settings/general.blade.php ENDPATH**/ ?>